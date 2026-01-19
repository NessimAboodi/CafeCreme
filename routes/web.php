<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes - Café Crème
|--------------------------------------------------------------------------
*/

// --- ROUTES PUBLIQUES ---
// Ces routes sont accessibles par tous les visiteurs du site.
Route::get('/', function () {
    return view('welcome');
})->name('home');

// La route menu passe par le contrôleur pour charger les données de la base de données
Route::get('/menu', [AdminController::class, 'publicMenu'])->name('menu');

Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/conditions', function () {
    return view('terms');
})->name('terms');


// --- ACCÈS ADMIN CACHÉ (Porte dérobée) ---
// C'est ici que vous vous connectez pour accéder à la gestion.
Route::get('/access-portal', [AdminController::class, 'showLogin'])->name('login');
Route::post('/access-portal', [AdminController::class, 'login']);


// --- ESPACE DE GESTION DU MENU (Protégé par Auth) ---
// Seul l'administrateur connecté peut accéder à ces routes.
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // 1. Afficher la page de gestion (Modifier / Liste)
    Route::get('/modifier-menu', [AdminController::class, 'editMenu'])->name('admin.menu.edit');

    // 2. Action pour mettre à jour les éléments existants (Prix, Noms, etc.)
    Route::post('/modifier-menu', [AdminController::class, 'updateMenu'])->name('admin.menu.update');

    // 3. Action pour AJOUTER un nouvel article à la carte
    Route::post('/ajouter-item', [AdminController::class, 'storeMenu'])->name('admin.menu.store');

    // 4. Action pour SUPPRIMER un article de la carte
    Route::delete('/supprimer-item/{id}', [AdminController::class, 'destroyMenu'])->name('admin.menu.destroy');

    // 5. Déconnexion
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

