<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions Légales et Politique de Confidentialité - Café Crème</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { background-color: #f1ece1; color: #967969; font-family: 'Montserrat', sans-serif; }
        .legal-content { padding: 80px 20px; max-width: 1000px; margin: 0 auto; line-height: 1.7; }
        h1 { font-size: 2.5rem; text-align: center; margin-bottom: 50px; font-weight: 700; text-transform: uppercase; }
        h2 { font-size: 1.5rem; margin-top: 40px; border-bottom: 2px solid #967969; padding-bottom: 10px; }
        h3 { font-size: 1.2rem; margin-top: 25px; }
        p, ul { margin-bottom: 20px; }
        a { color: #967969; font-weight: bold; text-decoration: underline; }
        .back-home { text-align: center; margin-top: 50px; }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo Café Crème">
    </a>
</nav>

<main class="legal-content">
    <h1>MENTIONS LÉGALES ET POLITIQUE DE CONFIDENTIALITÉ</h1>

    <h2>1. Informations légales</h2>
    <p>En vertu de l’article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l’économie numérique, il est précisé aux utilisateurs du site l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p>
    <ul>
        <li><strong>Propriétaire :</strong> CAFÉ CRÈME – 12 RUE PROFESSEUR ROLLET 69008 LYON</li>
        <li><strong>Créateur :</strong> [Votre Nom ou Café Crème]</li>
        <li><strong>Responsable publication :</strong> Café Crème – contact@cafe-creme-lyon.fr</li>
        <li><strong>Hébergeur :</strong> [Indiquez votre hébergeur, ex: OVH ou Hostinger]</li>
    </ul>

    <h2>2. Conditions générales d’utilisation du site</h2>
    <p>L’utilisation de notre site implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment.</p>

    <h2>3. Services proposés</h2>
    <p>Le site a pour objet de fournir une information concernant l’ensemble des activités de la société. Notre société s’efforce de fournir des informations aussi précises que possible.</p>

    <h2>4. Propriété intellectuelle et contrefaçons</h2>
    <p>Sauf mention contraire, nous sommes propriétaires des droits de propriété intellectuelle ou des droits d’usage des éléments accessibles sur le site.</p>
    <p><strong>Crédits photos :</strong> CAFÉ CRÈME</p>

    <h2>5. Limitations de responsabilité</h2>
    <p>Nous ne pourrons être tenue responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès à notre site.</p>

    <h2>6. Informations collectées (RGPD)</h2>
    <h3>1. Informations collectées automatiquement</h3>
    <p>Votre adresse IP, l'appareil et le navigateur web utilisés, ainsi que la date et l’heure de votre visite.</p>

    <h3>2. Formulaire de contact</h3>
    <p>Les informations collectées (nom, adresse mail) ne sont pas utilisées à des fins commerciales.</p>

    <h3>3. Droits d’accès</h3>
    <p>Vous avez le droit d’accéder, de corriger ou de supprimer vos informations personnelles en écrivant à : <strong>CAFÉ CRÈME – 12 RUE PROFESSEUR ROLLET 69008 LYON</strong>.</p>

    <h2>7. Cookies</h2>
    <p>Notre site utilise des cookies pour améliorer votre expérience. Vous pouvez configurer votre navigateur pour les refuser.</p>

    <h2>8. Droit applicable et attribution de juridiction</h2>
    <p>Tout litige en relation avec l’utilisation du notre site web est soumis au droit français. Il est fait attribution exclusive de juridiction aux tribunaux compétents de <strong>Lyon</strong>.</p>

    <div class="back-home">
        <a href="{{ route('home') }}" class="btn-yellow" style="text-decoration: none;">RETOUR À L'ACCUEIL</a>
    </div>
</main>

<footer style="background-color: #967969; color: #f1ece1; padding: 40px; text-align: center;">
    <p>© 2026 Café Crème - 12 Rue Professeur Rollet, 69008 Lyon</p>
</footer>

</body>
</html>
