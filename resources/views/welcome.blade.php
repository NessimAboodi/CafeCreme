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
        <img src="{{ asset('images/logo1.png') }}" alt="Logo Café Crème">
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
            <p>a mettre</p>
            <a href="{{ route('menu') }}" class="btn-yellow">DÉCOUVRIR LA CARTE</a>
        </div>
    </div>
</header>

<section class="intro-section">
    <div class="container">
        <h2>A mettre</h2>
        <p>a mettre</p>
    </div>
</section>

<section class="split-section dark-bg">
    <div class="split-wrapper">
        <div class="split-image">
            <img src="{{ asset('images/1.jpg') }}" alt="Pâtisseries maison">
        </div>
        <div class="split-text">
            <h2>Propos</h2>
            <p>histoire</p>

        </div>
    </div>
</section>

<section class="carousel-section">
    <div class="container">
        <h2 class="carousel-title">Les photos que vous avez prises chez nous</h2>
        <div class="carousel-container">
            <button class="carousel-control prev" id="prevBtn" aria-label="Précédent">❮</button>

            <div class="carousel-window">
                <div class="carousel-track" id="carouselTrack">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="carousel-item">
                            <img src="{{ asset('images/photo' . $i . '.png') }}" alt="Ambiance {{ $i }}">
                        </div>
                    @endfor
                </div>
            </div>

            <button class="carousel-control next" id="nextBtn" aria-label="Suivant">❯</button>
        </div>
    </div>
</section>

<script src="{{ asset('js/carousel.js') }}"></script>









<section class="reviews-container">
    <div class="elfsight-app-3f663381-0fac-4aa9-8669-025f85949666" data-elfsight-app-lazy></div>
</section>

<section class="map-section">
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2784.6225442531634!2d4.872473876805096!3d45.73866291515286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4c01729161f2d%3A0xb3b735c06ef8e096!2sCaf%C3%A9%20Cr%C3%A8me!5e0!3m2!1sfr!2sfr!4v1715600000000!5m2!1sfr!2sfr"
            width="100%"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
</section>
</main>







<footer>
    <p>© 2026 Café Crème - Lyon 8e</p>
</footer>

<script src="https://elfsightcdn.com/platform.js" async></script>

<footer>
    <p>© 2026 Café Crème - 12 Rue Professeur Rollet, 69008 Lyon</p>
</footer>

</body>
</html>
