<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Café Crème - Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://static.elfsight.com/platform/platform.js" async defer></script>
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo Café Crème">
    </a>

    <button class="explorer-btn" id="menu-trigger">
        <span class="btn-label" data-en="EXPLORE">EXPLORER</span>
        <div class="icon-burger">
            <span></span>
            <span></span>
        </div>
    </button>

    <div class="nav-overlay" id="nav-overlay">
        <div class="menu-items">
            <a href="{{ route('home') }}" data-en="HOME">ACCUEIL</a>
            <a href="{{ route('menu') }}" data-en="MENU">CARTE</a>
            <a href="{{ route('reservation') }}" data-en="BOOKING">RÉSERVATION</a>
            <a href="{{ route('contact') }}" data-en="CONTACT">CONTACT</a>

            <div class="lang-dropdown">
                <button class="lang-dropbtn" onclick="toggleLangMenu('lang-menu-mobile')">
                    <span class="current-lang-text">FR</span> <i class="fas fa-chevron-down"></i>
                </button>
                <div class="lang-options" id="lang-menu-mobile">
                    <a href="#" onclick="selectLanguage('fr')">Français</a>
                    <a href="#" onclick="selectLanguage('en')">English</a>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-links desktop-only">
        <a href="{{ route('home') }}" data-en="HOME">ACCUEIL</a>
        <a href="{{ route('menu') }}" data-en="MENU">CARTE</a>
        <a href="{{ route('reservation') }}" data-en="BOOKING">RÉSERVATION</a>
        <a href="{{ route('contact') }}" data-en="CONTACT">CONTACT</a>

        <div class="lang-dropdown">
            <button class="lang-dropbtn" onclick="toggleLangMenu('lang-menu-desktop')">
                <span class="current-lang-text">FR</span> <i class="fas fa-chevron-down"></i>
            </button>
            <div class="lang-options" id="lang-menu-desktop">
                <a href="#" onclick="selectLanguage('fr')">Français</a>
                <a href="#" onclick="selectLanguage('en')">English</a>
            </div>
        </div>
    </div>
</nav>

<main>
    <header class="hero-fullscreen">
        <div class="hero-overlay">
            <div class="hero-text">
                <h1> CAFÉ CRÈME</h1>
                <p data-en="To be added">A Mettre</p>
                <a href="{{ route('menu') }}" class="btn-yellow" data-en="DISCOVER THE MENU">DÉCOUVRIR LA CARTE</a>
            </div>
        </div>
    </header>

    <section class="intro-section reveal">
        <div class="container">
            <h2 data-en="To be added">A mettre</h2>
            <p data-en="To be added">A mettre</p>
        </div>
    </section>

    <section class="split-section dark-bg reveal">
        <div class="split-wrapper">
            <div class="split-image">
                <img src="{{ asset('images/1.jpg') }}" alt="Pâtisseries maison">
            </div>
            <div class="split-text">
                <h2 data-en="About Us">À Propos</h2>
                <p data-en="Our Story">Histoire</p>
            </div>
        </div>
    </section>

    <section class="carousel-section reveal">
        <div class="container">
            <h2 class="carousel-title" data-en="photos you took at our place">les photos que vous avez prises chez nous</h2>
            <div class="carousel-container">
                <button class="carousel-control prev" id="prevBtn">❮</button>
                <div class="carousel-window">
                    <div class="carousel-track" id="carouselTrack">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="carousel-item">
                                <img src="{{ asset('images/photo' . $i . '.png') }}" alt="Ambiance {{ $i }}">
                            </div>
                        @endfor
                    </div>
                </div>
                <button class="carousel-control next" id="nextBtn">❯</button>
            </div>
        </div>
    </section>

    <section class="reviews-section reveal">
        <div class="container">
            <h2 class="reviews-title" data-en="WHAT OUR CUSTOMERS SAY">CE QUE DISENT NOS CLIENTS</h2>
            <div class="elfsight-app-3f663381-0fac-4aa9-8669-025f85949666" data-elfsight-app-lazy></div>
        </div>
    </section>

    <section class="map-fullwidth reveal">
        <iframe
            src="https://maps.google.com/maps?q=Cafe+Creme+12+Rue+Professeur+Rollet+69008+Lyon&t=&z=15&ie=UTF8&iwloc=&output=embed"
            width="100%"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>

    <section class="merged-cta-section reveal">
        <div class="container">
            <div class="cta-content">
                <h2 data-en="CONTACT US">CONTACTEZ-NOUS</h2>
                <p data-en="Any questions? Connect with the Café Crème team.">Une question ? Connectez-vous avec l'équipe du Café Crème.</p>
                <a href="{{ route('contact') }}" class="btn-yellow-dark" data-en="CONTACT">CONTACTER</a>
            </div>
        </div>
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

<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>



{{-- CONFIGURATION DE L'IDENTITÉ AVANT LE CHARGEMENT DU SCRIPT --}}
<script>
    window.chatbaseUserConfig = {
        @if(isset($chatbaseToken))
        token: "{{ $chatbaseToken }}",
        @endif
        "name": "{{ auth()->check() ? auth()->user()->name : 'Visiteur' }}",
    };
</script>

{{-- SCRIPT CHATBASE FOURNI --}}
<script>
    (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="0O9vQWt4ybnIuqrA5sW0X";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
