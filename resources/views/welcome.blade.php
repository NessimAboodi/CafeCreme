<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Crème - Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/cafAީcrAިmeblanc.png') }}" alt="Logo Café Crème">
    </a>
    <div class="nav-links">
        <a href="{{ route('home') }}">ACCUEIL</a>
        <a href="{{ route('menu') }}">LA CARTE</a>
        <a href="{{ route('reservation') }}">RÉSERVATION</a>
        <a href="{{ route('contact') }}">CONTACT</a>
    </div>
</nav>

<header class="hero-fullscreen">
    <div class="hero-overlay">
        <div class="hero-text">
            <h1>CAFÉ CRÈME</h1>
            <p>Votre escale gourmande au cœur du 8e</p>
            <a href="{{ route('menu') }}" class="btn-yellow">DÉCOUVRIR LA CARTE</a>
        </div>
    </div>
</header>

<section class="intro-section">
    <div class="container">
        <h2>Bienvenue dans votre nouveau repaire</h2>
        <p>Situé au <strong>12 Rue Professeur Rollet, 69008 Lyon</strong>, Café Crème vous propose une immersion dans une ambiance chaleureuse et raffinée, parfaite pour une pause studieuse ou un moment de détente.</p>
    </div>
</section>

<section class="split-section dark-bg">
    <div class="split-wrapper">
        <div class="split-image">
            <img src="{{ asset('images/Brunchcontact.png') }}" alt="Pâtisseries maison">
        </div>
        <div class="split-text">
            <h2>UNE CARTE GOURMANDE QUI RAYONNE</h2>
            <p>Au Café Crème, nous proposons des douceurs tout au long de la journée, à déguster sur le pouce ou en prenant votre temps. Découvrez nos pâtisseries artisanales pour une pause savoureuse.</p>
            <a href="{{ route('menu') }}" class="btn-outline-white">DÉCOUVREZ LA CARTE</a>
        </div>
    </div>
</section>

<section class="gallery-full">
    <div class="gallery-container">
        <div class="gallery-img">
            <img src="{{ asset('images/Brunchcontact.png') }}" alt="Boisson gourmande">
        </div>
        <div class="gallery-img">
            <img src="{{ asset('images/Brunchcontact.png') }}" alt="Préparation café">
        </div>
    </div>
</section>

<section class="split-section light-bg">
    <div class="split-wrapper reverse">
        <div class="split-text">
            <h2>LE BAR DE TOUS LES POSSIBLES</h2>
            <p>Que vous soyez amateur de latte art ou adepte de boissons rafraîchissantes, notre équipe met tout son savoir-faire pour vous offrir une expérience unique. Profitez de nos services <strong>sur place ou à emporter</strong>.</p>
            <a href="{{ route('menu') }}" class="btn-outline-brown">DÉCOUVREZ LA CARTE</a>
        </div>
        <div class="split-image">
            <img src="{{ asset('images/Brunchcontact.png') }}" alt="Nos boissons">
        </div>
    </div>
</section>

<footer>
    <p>© 2026 Café Crème - 12 Rue Professeur Rollet, 69008 Lyon</p>
</footer>

</body>
</html>
