<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes - Café Crème
|--------------------------------------------------------------------------
*/

// --- ROUTES PUBLIQUES ---
Route::get('/', function () {
    return view('welcome');
})->name('home');

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

// Envoi des formulaires
Route::post('/contact', [AdminController::class, 'sendContact'])->name('contact.send');
Route::post('/reservation', [AdminController::class, 'sendReservation'])->name('reservation.send');

// API pour le JavaScript (Vérification des créneaux en temps réel)
Route::get('/api/booked-slots', [AdminController::class, 'getBookedSlots']);


// --- ACCÈS ADMIN (Connexion) ---
Route::get('/access-portal', [AdminController::class, 'showLogin'])->name('login');
Route::post('/access-portal', [AdminController::class, 'login']);


// --- ESPACE PRIVÉ ADMIN (Protégé par Auth) ---
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // 1. Gestion du Menu
    Route::get('/modifier-menu', [AdminController::class, 'editMenu'])->name('admin.menu.edit');
    Route::post('/modifier-menu', [AdminController::class, 'updateMenu'])->name('admin.menu.update');
    Route::post('/ajouter-item', [AdminController::class, 'storeMenu'])->name('admin.menu.store');
    Route::delete('/supprimer-item/{id}', [AdminController::class, 'destroyMenu'])->name('admin.menu.destroy');

    // 2. Gestion des Réservations
    Route::get('/reservations', [AdminController::class, 'listReservations'])->name('admin.reservations');

    // 3. Déconnexion
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
