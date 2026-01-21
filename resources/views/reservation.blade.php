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
        <h1 data-en="Reservation">Réservation</h1>
        <p data-en="Book your table to ensure a seat for your next visit!">Réservez votre table pour garantir votre place lors de votre prochaine visite !</p>
    </section>

    <section class="contact-quick-info">
        <div class="info-item">
            <div class="icon">📅</div>
            <h3 data-en="Date">Date & Jour</h3>
            <p data-en="Select your preferred day">Choisissez votre jour de visite</p>
        </div>
        <div class="info-item">
            <div class="icon">📞</div>
            <h3 data-en="Phone">Téléphone</h3>
            <p>09 86 15 66 57</p>
        </div>
        <div class="info-item">
            <div class="icon">⏰</div>
            <h3 data-en="Opening Hours">Horaires</h3>
            <p data-en="Mon - Fri : 08:00 - 19:00 / Sat - Sun : 09:30 - 17:00">
                Lun - Ven : 08h - 19h<br>
                Sam - Dim : 09h30 - 17h
            </p>
        </div>
    </section>

    <section class="contact-form-section">
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 12px; text-align: center; font-weight: bold; border: 1px solid #c3e6cb; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('reservation.send') }}" method="POST" class="lobut-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label data-en="Last Name & First Name *">Nom et Prénom *</label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="full_name" required>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label data-en="Phone Number *">Numéro de téléphone *</label>
                    <div class="input-icon-wrapper">
                        <input type="tel" name="phone" required>
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label data-en="Date *">Date *</label>
                    <div class="input-icon-wrapper">
                        <input type="date" name="date" id="res-date" min="{{ date('Y-m-d') }}" required>
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label data-en="Time *">Heure *</label>
                    <div class="input-icon-wrapper">
                        <select name="time" id="res-time" required>
                            <option value="" disabled selected>Choisissez d'abord une date</option>
                        </select>
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label data-en="Number of people *">Nombre de personnes *</label>
                <div class="input-icon-wrapper">
                    <input type="number" name="guests" min="1" required>
                    <i class="fas fa-users"></i>
                </div>
            </div>

            <div class="form-group">
                <label data-en="Allergies (if any)">Avez-vous des allergies ?</label>
                <textarea name="allergies" rows="2" placeholder="Ex: Gluten, Arachides..."></textarea>
            </div>

            <div class="form-group">
                <label data-en="Special Requests (Stroller, etc.)">Précisions (ex: poussette, chaise haute...)</label>
                <textarea name="notifications" rows="3"></textarea>
            </div>

            <button type="submit" class="btn-submit" data-en="Send Reservation">Réserver ma table</button>
        </form>
    </section>
</main>

<footer>
    <div class="container footer-grid">
        <div class="footer-col">
            <h3 data-en="FIND US">NOUS TROUVER</h3>
            <p><i class="fas fa-map-marker-alt"></i> 12 Rue Professeur Rollet<br>69008 Lyon</p>
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
