<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - Café Crème</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo Café Crème">
    </a>
    <div class="nav-links desktop-only">
        <a href="{{ route('home') }}">ACCUEIL</a>
        <a href="{{ route('menu') }}">CARTE</a>
        <a href="{{ route('reservation') }}">RÉSERVATION</a>
        <a href="{{ route('contact') }}">CONTACT</a>
    </div>
</nav>

<main class="lobut-style-contact">
    <section class="contact-header">
        <h1 data-en="Reservation">Réservation</h1>
        <p>Réservez votre table pour garantir votre place !</p>
    </section>

    <section class="contact-form-section">
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 12px; margin-bottom: 20px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('reservation.send') }}" method="POST" class="lobut-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Nom et Prénom *</label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="full_name" required>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Numéro de téléphone *</label>
                    <div class="input-icon-wrapper">
                        <input type="tel" name="phone" required>
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Date *</label>
                    <div class="input-icon-wrapper">
                        <input type="date" name="date" id="res-date" min="{{ date('Y-m-d') }}" required>
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Heure *</label>
                    <div class="input-icon-wrapper">
                        <select name="time" id="res-time" required>
                            <option value="" disabled selected>Choisissez d'abord une date</option>
                        </select>
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Nombre de personnes *</label>
                <div class="input-icon-wrapper">
                    <input type="number" name="guests" min="1" required>
                    <i class="fas fa-users"></i>
                </div>
            </div>

            <div class="form-group">
                <label>Allergies ou précisions</label>
                <textarea name="notifications" rows="3" placeholder="Poussette, chaise haute, allergies..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Confirmer la réservation</button>
        </form>
    </section>
</main>

<footer>
    <div class="container footer-grid">
        <div class="footer-col">
            <h3 data-en="FIND US">NOUS TROUVER</h3>
            <p><i class="fas fa-map-marker-alt"></i> 12 Rue Professeur Rollet<br>69008 Lyon</p>
            <p><i class="fas fa-phone"></i> +33 09 86 15 66 57</p>
        </div>
        <div class="footer-col">
            <h3 data-en="EXPLORE">EXPLORER</h3>
            <ul>
                <li><a href="{{ route('home') }}" data-en="HOME">ACCUEIL</a></li>
                <li><a href="{{ route('menu') }}" data-en="MENU">LA CARTE</a></li>
                <li><a href="{{ route('reservation') }}" data-en="BOOKING">RÉSERVATION</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3 data-en="FOLLOW US">SUIVEZ-NOUS</h3>
            <div class="footer-socials">
                <a href="https://www.instagram.com/cafecreme_lyon/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2026 Café Crème - Lyon 8e | <a href="{{ route('terms') }}" class="small-terms" data-en="Our Terms">Nos Conditions</a></p>
    </div>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/reservation.js') }}"></script>
</body>
</html>
