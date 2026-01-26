<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\Reservation; // Importation du modèle Reservation pour la base de données
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Mail\ReservationMessage;

class AdminController extends Controller
{
    // --- PARTIE PUBLIQUE ---

    /**
     * Affiche la carte aux clients en récupérant les données de la base.
     */
    public function publicMenu()
    {
        // On récupère tous les plats et on les groupe par catégorie pour l'affichage
        $items = MenuItem::all()->groupBy('category');
        return view('menu', compact('items'));
    }

    // --- PARTIE AUTHENTIFICATION ---

    /**
     * Affiche la page de connexion cachée.
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    /**
     * Gère la connexion de l'administrateur.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirection vers l'interface de gestion du menu
            return redirect()->route('admin.menu.edit');
        }

        return back()->withErrors(['email' => 'Accès refusé.']);
    }

    /**
     * Déconnecte l'administrateur.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // --- PARTIE GESTION DU MENU (ADMIN) ---

    /**
     * Affiche l'interface de modification, d'ajout et de suppression.
     */
    public function editMenu()
    {
        $items = MenuItem::all()->groupBy('category');
        return view('admin.menu_edit', compact('items'));
    }

    /**
     * Enregistre un nouveau plat dans la base de données.
     */
    public function storeMenu(Request $request)
    {
        $data = $request->validate([
            'category'       => 'required|string',
            'name'           => 'required|string',
            'name_en'        => 'nullable|string',
            'description'    => 'nullable|string',
            'description_en' => 'nullable|string',
            'price'          => 'required|string',
        ]);

        MenuItem::create($data);
        return back()->with('success', 'Le plat a bien été ajouté à la carte !');
    }

    /**
     * Met à jour tous les plats modifiés dans la liste.
     */
    public function updateMenu(Request $request)
    {
        if ($request->has('items')) {
            foreach ($request->items as $id => $data) {
                MenuItem::findOrFail($id)->update($data);
            }
        }
        return back()->with('success', 'La carte a été mise à jour avec succès !');
    }

    /**
     * Supprime définitivement un plat de la carte.
     */
    public function destroyMenu($id)
    {
        MenuItem::findOrFail($id)->delete();
        return back()->with('success', 'Le plat a été retiré de la carte.');
    }

    // --- PARTIE CONTACT ---

    /**
     * Gère l'envoi du formulaire de contact par email.
     */
    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'lastname'  => 'required|string',
            'firstname' => 'required|string',
            'email'     => 'required|email',
            'message'   => 'required|string',
        ]);

        Mail::to('cafecreme69008@gmail.com')->send(new ContactMessage($data));
        return back()->with('success', 'Merci ! Votre message a bien été envoyé.');
    }

    // --- PARTIE RÉSERVATION ---

    /**
     * Gère l'envoi et l'enregistrement de la réservation.
     */
    public function sendReservation(Request $request)
    {
        $data = $request->validate([
            'full_name'     => 'required|string',
            'phone'         => 'required|string',
            'date'          => 'required|date',
            'time'          => 'required|string',
            'guests'        => 'required|integer|min:1',
            'notifications' => 'nullable|string',
        ]);

        // 1. Enregistrement en base de données pour l'administration
        Reservation::create($data);

        // 2. Envoi de l'email de notification
        Mail::to('cafecreme69008@gmail.com')->send(new ReservationMessage($data));

        return back()->with('success', 'Votre demande de réservation a bien été envoyée et enregistrée !');
    }

    /**
     * Affiche la liste des réservations pour l'administrateur.
     */
    public function listReservations()
    {
        // On récupère les réservations triées par date décroissante (plus récentes d'abord)
        $reservations = Reservation::orderBy('date', 'desc')->orderBy('time', 'asc')->get();
        return view('admin.reservations', compact('reservations'));
    }

    /**
     * API : Retourne les créneaux déjà réservés pour une date donnée.
     * Utilisé pour désactiver/griser les options dans le formulaire client.
     */
    public function getBookedSlots(Request $request)
    {
        $date = $request->query('date');
        $bookedSlots = Reservation::where('date', $date)->pluck('time');

        return response()->json($bookedSlots);
    }
}
