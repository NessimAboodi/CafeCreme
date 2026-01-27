<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\Reservation; // Importation du modèle Reservation pour la base de données
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Mail\ReservationMessage;
use Illuminate\Support\Facades\Storage; // Nécessaire pour la gestion des fichiers

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
     * Enregistre un nouveau plat dans la base de données avec sa photo.
     */
    public function storeMenu(Request $request)
    {
        // 1. Validation des données, y compris l'image
        $data = $request->validate([
            'category'       => 'required|string',
            'name'           => 'required|string',
            'name_en'        => 'nullable|string',
            'description'    => 'nullable|string',
            'description_en' => 'nullable|string',
            'price'          => 'required|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de la photo
        ]);

        // 2. Gestion du téléchargement de la photo
        if ($request->hasFile('image')) {
            // On sauvegarde l'image dans storage/app/public/menu_images
            $path = $request->file('image')->store('menu_images', 'public');
            // On enregistre le chemin dans le tableau $data pour la base de données
            $data['image'] = $path;
        }

        // 3. Création du plat dans la base
        MenuItem::create($data);

        return back()->with('success', 'Le plat et sa photo ont bien été ajoutés à la carte !');
    }

    /**
     * Met à jour tous les plats modifiés dans la liste (y compris les photos).
     */
    public function updateMenu(Request $request)
    {
        if ($request->has('items')) {
            foreach ($request->items as $id => $data) {
                $item = MenuItem::findOrFail($id);

                // Vérifier si un nouveau fichier image a été téléchargé pour ce plat
                if ($request->hasFile("items.$id.image")) {
                    // 1. Supprimer l'ancienne image du serveur si elle existe
                    if ($item->image) {
                        Storage::disk('public')->delete($item->image);
                    }
                    // 2. Sauvegarder la nouvelle image
                    $path = $request->file("items.$id.image")->store('menu_images', 'public');
                    // 3. Ajouter le chemin à la liste des données à mettre à jour
                    $data['image'] = $path;
                }

                // Mise à jour finale de l'item en base de données
                $item->update($data);
            }
        }
        return back()->with('success', 'La carte a été mise à jour avec succès !');
    }

    /**
     * Supprime définitivement un plat de la carte.
     */
    public function destroyMenu($id)
    {
        $item = MenuItem::findOrFail($id);

        // Supprimer le fichier image du serveur pour ne pas encombrer le stockage
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();
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
