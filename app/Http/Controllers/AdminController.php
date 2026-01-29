<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Mail\ReservationMessage;
use Illuminate\Support\Facades\Storage;
use Firebase\JWT\JWT;

class AdminController extends Controller
{
    // --- PARTIE PUBLIQUE ---

    /**
     * Affiche la carte aux clients avec le token Chatbase si connecté.
     */
    public function publicMenu()
    {
        $items = MenuItem::all()->groupBy('category');
        $chatbaseToken = null;

        if (auth()->check()) {
            $user = auth()->user();
            $payload = [
                'user_id' => (string) $user->id,
                'email'   => $user->email,
                'name'    => $user->name,
                'exp'     => time() + 3600
            ];
            $chatbaseToken = JWT::encode($payload, env('CHATBASE_SECRET'), 'HS256');
        }

        return view('menu', compact('items', 'chatbaseToken'));
    }

    // --- PARTIE AUTHENTIFICATION ---

    public function showLogin()
    {
        return view('admin.login');
    }

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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // --- PARTIE GESTION DU MENU (ADMIN) ---

    public function editMenu()
    {
        $items = MenuItem::all()->groupBy('category');
        return view('admin.menu_edit', compact('items'));
    }

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
        return back()->with('success', 'Le plat a bien été ajouté !');
    }

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
        return back()->with('success', 'La carte a été mise à jour !');
    }

    public function destroyMenu($id)
    {
        $item = MenuItem::findOrFail($id);
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return back()->with('success', 'Le plat a été retiré.');
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

        return back()->with('success', 'Votre demande de réservation a bien été enregistrée !');
    }

    /**
     * Liste des réservations à venir (Aujourd'hui et futur)
     */
    public function listReservations()
    {
        $reservations = Reservation::where('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        return view('admin.reservations', compact('reservations'));
    }

    /**
     * Liste des réservations passées (Archives)
     */
    public function archiveReservations()
    {
        $archives = Reservation::where('date', '<', now()->toDateString())
            ->orderBy('date', 'desc')
            ->orderBy('time', 'asc')
            ->get();

        return view('admin.reservations_archive', compact('archives'));
    }

    /**
     * Supprimer une réservation
     */
    public function destroyReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return back()->with('success', 'La réservation a été supprimée.');
    }

    /**
     * Modifier une réservation existante
     */
    public function updateReservation(Request $request, $id)
    {
        $data = $request->validate([
            'full_name'     => 'required|string',
            'phone'         => 'required|string',
            'date'          => 'required|date',
            'time'          => 'required|string',
            'guests'        => 'required|integer|min:1',
            'notifications' => 'nullable|string',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($data);

        return back()->with('success', 'La réservation a été mise à jour avec succès !');
    }

    public function getBookedSlots(Request $request)
    {
        $date = $request->query('date');
        $bookedSlots = Reservation::where('date', $date)->pluck('time');
        return response()->json($bookedSlots);
    }

    // --- PARTIE STATISTIQUES ---

    /**
     * Affiche les statistiques filtrables par mois et année avec un graphique corrigé.
     */
    public function showStats(Request $request)
    {
        // Récupération des filtres (par défaut : mois et année actuels)
        $selectedMonth = $request->query('month', date('m'));
        $selectedYear = $request->query('year', date('Y'));

        // 1. PRÉPARATION DES DONNÉES DU GRAPHIQUE (12 Mois garantis)
        // On récupère les données brutes
        $rawStats = Reservation::select(
            DB::raw('count(id) as total'),
            DB::raw("DATE_FORMAT(date, '%m') as month")
        )
            ->whereYear('date', $selectedYear)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // On construit les tableaux finaux pour Chart.js (Jan -> Déc)
        $chartData = [];
        $chartLabels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];

        for ($i = 1; $i <= 12; $i++) {
            // On formate le mois en "01", "02"... pour matcher avec la base de données
            $key = str_pad($i, 2, '0', STR_PAD_LEFT);
            // Si on a des réservations ce mois-là, on met le total, sinon 0
            $chartData[] = $rawStats[$key] ?? 0;
        }

        // 2. Répartition par jour de la semaine (pour le mois et l'année sélectionnés)
        $resPerDay = Reservation::select(
            DB::raw('count(id) as total'),
            DB::raw("DAYNAME(date) as day")
        )
            ->whereMonth('date', $selectedMonth)
            ->whereYear('date', $selectedYear)
            ->groupBy('day')
            ->get();

        // 3. Créneaux horaires les plus populaires (pour le mois et l'année sélectionnés)
        $popularTimes = Reservation::select('time', DB::raw('count(id) as total'))
            ->whereMonth('date', $selectedMonth)
            ->whereYear('date', $selectedYear)
            ->groupBy('time')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // 4. Total de couverts pour la période sélectionnée
        $totalGuestsSelected = Reservation::whereMonth('date', $selectedMonth)
            ->whereYear('date', $selectedYear)
            ->sum('guests');

        return view('admin.stats', compact(
            'chartLabels',
            'chartData',
            'resPerDay',
            'popularTimes',
            'totalGuestsSelected',
            'selectedMonth',
            'selectedYear'
        ));
    }
}
