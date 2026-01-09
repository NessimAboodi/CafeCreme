<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route pour l'Accueil (déjà existante)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route pour le Menu
Route::get('/menu', function () {
    return view('menu'); // Vous devrez créer resources/views/menu.blade.php
})->name('menu');

// Route pour la Réservation
Route::get('/reservation', function () {
    return view('reservation'); // Vous devrez créer resources/views/reservation.blade.php
})->name('reservation');

// Route pour le Contact
Route::get('/contact', function () {
    return view('contact'); // Vous devrez créer resources/views/contact.blade.php
})->name('contact');

Route::get('/termes-et-conditions', function () {
    return view('terms');
})->name('terms');
