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
    <div class="nav-links">
        <a href="{{ route('home') }}">Accueil</a>
        <a href="{{ route('menu') }}">La Carte</a>
        <a href="{{ route('reservation') }}">Réservation</a>
        <a href="{{ route('contact') }}">Contact</a>
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

</body>
</html>
