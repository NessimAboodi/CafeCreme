<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Mail\ReservationMessage;
use Illuminate\Support\Facades\Storage;
use Firebase\JWT\JWT; // Importation pour Chatbase Identity Verification

class AdminController extends Controller
{
    // --- PARTIE PUBLIQUE ---

    /**
     * Affiche la carte aux clients avec le token Chatbase si connecté.
     */
    public function publicMenu()
    {
        // Récupération des plats
        $items = MenuItem::all()->groupBy('category');

        // Initialisation du token Chatbase
        $chatbaseToken = null;

        // Si l'utilisateur est authentifié (Admin ou Client), on génère le token de vérification
        if (auth()->check()) {
            $user = auth()->user();
            $payload = [
                'user_id' => (string) $user->id,
                'email'   => $user->email,
                'name'    => $user->name,
                'exp'     => time() + 3600 // Expire dans 1 heure
            ];

            // Signature du token avec la clé secrète définie dans le .env
            $chatbaseToken = JWT::encode($payload, env('CHATBASE_SECRET'), 'HS256');
        }

        return view('menu', compact('items', 'chatbaseToken'));
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
        $data = $request->validate([
            'category'       => 'required|string',
            'name'           => 'required|string',
            'name_en'        => 'nullable|string',
            'description'    => 'nullable|string',
            'description_en' => 'nullable|string',
            'price'          => 'required|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu_images', 'public');
            $data['image'] = $path;
        }

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

                if ($request->hasFile("items.$id.image")) {
                    if ($item->image) {
                        Storage::disk('public')->delete($item->image);
                    }
                    $path = $request->file("items.$id.image")->store('menu_images', 'public');
                    $data['image'] = $path;
                }

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

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();
        return back()->with('success', 'Le plat a été retiré de la carte.');
    }

    // --- PARTIE CONTACT ---

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

        Reservation::create($data);
        Mail::to('cafecreme69008@gmail.com')->send(new ReservationMessage($data));

        return back()->with('success', 'Votre demande de réservation a bien été envoyée et enregistrée !');
    }

    public function listReservations()
    {
        $reservations = Reservation::orderBy('date', 'desc')->orderBy('time', 'asc')->get();
        return view('admin.reservations', compact('reservations'));
    }

    public function getBookedSlots(Request $request)
    {
        $date = $request->query('date');
        $bookedSlots = Reservation::where('date', $date)->pluck('time');

        return response()->json($bookedSlots);
    }
}
