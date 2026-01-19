<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;

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
            // Redirection directe vers l'interface de gestion du menu
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
                // Met à jour chaque plat individuellement via son ID
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
}
