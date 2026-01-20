<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Café Crème</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

<main class="lobut-style-contact">
    <section class="contact-header">
        <h1 data-en="Contact Us">Contactez-nous</h1>
        <p data-en="Any questions? A coffee craving? Use the form below or stop by!">Une question ? Une envie de café ? Utilisez le formulaire ci-dessous ou passez nous voir !</p>
    </section>

    <section class="contact-quick-info">
        <div class="info-item">
            <div class="icon">📍</div>
            <h3 data-en="Address">Adresse</h3>
            <p>12 Rue Professeur Rollet<br>69008 Lyon</p>
        </div>
        <div class="info-item">
            <div class="icon">📞</div>
            <h3 data-en="Phone">Téléphone</h3>
            <p>09 86 15 66 57</p>
        </div>
        <div class="info-item">
            <div class="icon">⏰</div>
            <h3 data-en="Opening Hours">Horaires</h3>
            <p data-en="Mon - Fri : 08:00 - 19:00 / Sat - Sun : 09:30 - 17:00">Lun - Ven : 08h - 19h<br>Sam - Dim : 09h30 - 17h</p>
        </div>
    </section>

    <section class="contact-form-section">
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px; text-align: center; font-weight: bold; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST" class="lobut-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label data-en="Last Name *">Nom *</label>
                    <input type="text" name="lastname" required>
                </div>
                <div class="form-group">
                    <label data-en="First Name *">Prénom *</label>
                    <input type="text" name="firstname" required>
                </div>
            </div>

            <div class="form-group">
                <label data-en="Email Address *">Adresse mail *</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label data-en="Message *">Message *</label>
                <textarea name="message" rows="5" required></textarea>
            </div>

            <div class="privacy-notice">
                <input type="checkbox" id="privacy" required>
                <label for="privacy" data-en="I accept the Privacy Policy.">J'accepte la Politique de Confidentialité.</label>
            </div>

            <button type="submit" class="btn-submit" data-en="Send my message">Envoyer mon message</button>
        </form>
    </section>
</main>

<script src="{{ asset('js/main.js') }}"></script>
</body>

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
</html>
