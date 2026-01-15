<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - Café Crème</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Ajustement spécifique pour que le module de réservation prenne bien toute la place */
        .booking-card {
            padding: 20px !important; /* Réduit le padding pour laisser plus de place au module */
            display: block !important; /* Désactive le flex centering pour l'iframe */
            overflow: hidden;
            min-height: 650px; /* Taille optimale pour le calendrier ViteUneTable */
        }
        iframe {
            border: none;
            width: 100%;
            height: 600px;
            border-radius: 8px;
        }
    </style>
</head>
<body style="background-color: #f1ece1;">

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo Café Crème">
    </a>

    <button class="explorer-btn" id="menu-trigger">
        <span class="btn-label">EXPLORER</span>
        <div class="icon-burger">
            <span></span>
            <span></span>
        </div>
    </button>

    <div class="nav-overlay" id="nav-overlay">
        <div class="menu-items">
            <a href="{{ route('home') }}">ACCUEIL</a>
            <a href="{{ route('menu') }}">CARTE</a>
            <a href="{{ route('reservation') }}">RÉSERVATION</a>
            <a href="{{ route('contact') }}">CONTACT</a>
        </div>
    </div>

    <div class="nav-links desktop-only">
        <a href="{{ route('home') }}">ACCUEIL</a>
        <a href="{{ route('menu') }}">CARTE</a>
        <a href="{{ route('reservation') }}">RÉSERVATION</a>
        <a href="{{ route('contact') }}">CONTACT</a>
    </div>
</nav>

<main class="reserva-page">
    <header class="reserva-hero">
        <div class="container">
            <h1>RÉSERVATION</h1>
            <p>RÉSERVEZ VOTRE TABLE EN QUELQUES CLICS</p>
        </div>
    </header>

    <section class="booking-section">
        <div class="container">
            <div class="booking-card">
                <iframe
                    src="https://app.viteunetable.com/fr/reservation/cafecreme/"
                    title="Réservation ViteUneTable Café Crème">
                </iframe>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container footer-grid">
        <div class="footer-col">
            <h3>NOUS TROUVER</h3>
            <p><i class="fas fa-map-marker-alt"></i> 12 Rue Professeur Rollet<br>69008 Lyon</p>
        </div>
        <div class="footer-col">
            <h3>EXPLORER</h3>
            <ul>
                <li><a href="{{ route('home') }}">ACCUEIL</a></li>
                <li><a href="{{ route('menu') }}">LA CARTE</a></li>
                <li><a href="{{ route('reservation') }}">RÉSERVATION</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3>SUIVEZ-NOUS</h3>
            <div class="footer-socials">
                <a href="https://www.instagram.com/cafecreme_lyon/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2026 CAFÉ CRÈME | <a href="{{ route('terms') }}" class="small-terms">Nos Conditions</a></p>
    </div>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
