<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Complet - Café Crème</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

<main class="menu-page">
    <header class="menu-header">
        <h1 data-en="The Café Crème Menu">La Carte du Café Crème</h1>
        <p>CHEZ NOUS ÇA PASSE CRÈME !</p>
    </header>

    <div class="container">
        @foreach($items as $category => $categoryItems)
            <section class="menu-section">
                <h2 class="category-title" data-en="{{ $category }}">{{ $category }}</h2>

                <div class="{{ $category == 'Nos Formules' ? 'formula-grid' : 'menu-grid' }}">

                    @foreach($categoryItems as $item)
                        @if($category == 'Nos Formules')
                            <div class="formula-box">
                                <h3 data-en="{{ $item->name_en ?? $item->name }} — {{ $item->price }}€">
                                    {{ $item->name }} — {{ $item->price }}€
                                </h3>
                                <p data-en="{{ $item->description_en ?? $item->description }}">
                                    {{ $item->description }}
                                </p>
                            </div>
                        @else
                            <div class="menu-item full">
                                @if($item->image)
                                    <div class="item-photo">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                                    </div>
                                @endif

                                <div class="item-info">
                                    <span class="item-name" data-en="{{ $item->name_en ?? $item->name }}">
                                        {{ $item->name }}
                                    </span>
                                    @if($item->description)
                                        <p class="item-desc" data-en="{{ $item->description_en ?? $item->description }}">
                                            {{ $item->description }}
                                        </p>
                                    @endif
                                </div>
                                <span class="price">{{ $item->price }}€</span>
                            </div>
                        @endif
                    @endforeach

                </div>
            </section>
        @endforeach
    </div>
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
</body>
</html>
