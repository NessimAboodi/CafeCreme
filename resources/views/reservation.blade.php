<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - Café Crème</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo Café Crème">
    </a>
    <div class="nav-links">
        <a href="{{ route('home') }}">ACCUEIL</a>
        <a href="{{ route('menu') }}">LA CARTE</a>
        <a href="{{ route('reservation') }}">RÉSERVATION</a>
        <a href="{{ route('contact') }}">CONTACT</a>
    </div>
</nav>

<main class="reserva-page">
    <header class="reserva-hero">
        <div class="container">
            <h1>RÉSERVER UNE TABLE</h1>
            <p>Vivez l'expérience Café Crème</p>
        </div>
    </header>

    <section class="booking-section">
        <div class="container">
            <div class="booking-card">
                <div id="popina-widget-container">
                    <p class="placeholder-text">Le module de réservation Popina se chargera ici...</p>
                    <a href="#" class="btn-yellow-dark">OUVRIR LE MODULE</a>
                </div>
            </div>
        </div>
    </section>

    <section class="reserva-info">
        <div class="container footer-grid">
            <div class="footer-col">
                <h3>HORAIRES</h3>
                <p>Lundi - Vendredi : 08h00 - 19h00</p>
                <p>Samedi - Dimanche : 09h00 - 18h00</p>
            </div>
            <div class="footer-col">
                <h3>GROUPES</h3>
                <p>Pour les réservations de plus de 8 personnes, merci de nous contacter directement par téléphone.</p>
            </div>
            <div class="footer-col">
                <h3>CONTACT</h3>
                <p>12 Rue Professeur Rollet, Lyon</p>
                <p>+33 4 XX XX XX XX</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container footer-grid">
        <div class="footer-col">
            <h3>NOUS TROUVER</h3>
            <p>12 Rue Professeur Rollet<br>69008 Lyon</p>
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
            <p><a href="#">INSTAGRAM</a></p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2026 CAFÉ CRÈME | <a href="{{ route('terms') }}" class="small-terms">Conditions</a></p>
    </div>
</footer>

</body>
</html>
