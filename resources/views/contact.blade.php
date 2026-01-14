<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Café Crème</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

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

<main class="lobut-style-contact">
    <section class="contact-header">
        <h1>Contactez-nous</h1>
        <p>Une question ? Une envie de café ? Utilisez le formulaire ci-dessous ou passez nous voir !</p>
    </section>

    <section class="contact-quick-info">
        <div class="info-item">
            <div class="icon">📍</div>
            <h3>Adresse</h3>
            <p>12 Rue Professeur Rollet<br>69008 Lyon</p>
        </div>
        <div class="info-item">
            <div class="icon">📞</div>
            <h3>Téléphone</h3>
            <p>09 86 15 66 57</p>
        </div>
        <div class="info-item">
            <div class="icon">⏰</div>
            <h3>Horaires</h3>
            <p>Lun - Ven : 08h - 19h<br>Sam - Dim : 09h30 - 17h</p>
        </div>
    </section>

    <section class="contact-form-section">
        <form action="#" method="POST" class="lobut-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Nom *</label>
                    <input type="text" name="lastname" required>
                </div>
                <div class="form-group">
                    <label>Prénom *</label>
                    <input type="text" name="firstname" required>
                </div>
            </div>

            <div class="form-group">
                <label>Adresse mail *</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Message *</label>
                <textarea name="message" rows="5" required></textarea>
            </div>

            <div class="privacy-notice">
                <input type="checkbox" id="privacy" required>
                <label for="privacy">J'accepte la Politique de Confidentialité.</label>
            </div>

            <button type="submit" class="btn-submit">Envoyer mon message</button>
        </form>
    </section>
</main>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
