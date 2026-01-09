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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<section class="access-section">
    <div class="access-container">
        <div class="map-box">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2784.2483864765625!2d4.8711442!3d45.7461621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4c19451480f77%3A0xc39f9976378e90e7!2s12%20Rue%20Professeur%20Rollet%2C%2069008%20Lyon!5e0!3m2!1sfr!2sfr!4v1700000000000"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

        <div class="info-box">
            <h2 class="section-title">NOUS TROUVER</h2>
            <p class="address">
                <i class="fas fa-map-marker-alt"></i>
                12 Rue Professeur Rollet, 69008 Lyon
            </p>

            <div class="social-links">
                <h3>SUIVEZ-NOUS</h3>
                <div class="icons">
                    <a href="https://www.instagram.com/votre_compte" target="_blank" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/votre_page" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>






</main>









<script src="https://elfsightcdn.com/platform.js" async></script>



</body>
</html>
