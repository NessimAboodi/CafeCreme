<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Complet - Café Crème</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<nav>
    <a href="/" class="brand-container">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo">
    </a>
    <div class="nav-links">
        <a href="/">Accueil</a>
        <a href="/menu">Menu</a>
        <a href="/reservation">Réservation</a>
        <a href="/contact">Contact</a>
    </div>
</nav>

<main class="menu-page">
    <header class="menu-header">
        <h1>La Carte du Café Crème</h1>
        <p>12 RUE PROFESSEUR ROLLET, LYON 69008</p>
    </header>

    <div class="container">

        <section class="menu-section formulas">
            <h2 class="category-title">🌟 Nos Formules</h2>
            <div class="formula-grid">
                <div class="formula-box">
                    <h3>BRUNCH — 25€</h3>
                    <p>Citronnade à volonté + Boisson chaude + Focaccia salée avec salade + Dessert (Pancake ou Bowl)</p>
                </div>
                <div class="formula-box">
                    <h3>FORMULE GOÛTER — 6.50€</h3>
                    <p>Dès 15h. Pâtisserie du jour + Boisson chaude au choix (+2€ pour Superfood)</p>
                </div>
                <div class="formula-box">
                    <h3>HAPPY HOUR — 7.50€</h3>
                    <p>Tapas du jour + Bière 50cl au choix (Blonde ou Cerise)</p>
                </div>
            </div>
        </section>






        <section class="menu-section">
            <h2 class="category-title">🍵 Superfood Bar</h2>
            <p class="category-subtitle">Lait végétal disponible : +0.50€</p>
            <div class="menu-grid">
                <div class="menu-item"><span>Matcha Latte</span><span class="price">5.50€</span></div>
                <div class="menu-item"><span>Mango Matcha Latte</span><span class="price">6.50€</span></div>
                <div class="menu-item"><span>Pink Matcha Latte</span><span class="price">6.50€</span></div>
                <div class="menu-item"><span>Chaï Latte</span><span class="price">5.50€</span></div>
                <div class="menu-item"><span>Golden Latte</span><span class="price">5.50€</span></div>
                <div class="menu-item"><span>Pink Black Blue Latte</span><span class="price">5.50€</span></div>
                <div class="menu-item"><span>Ube Latte</span><span class="price">5.50€</span></div>
            </div>
        </section>

            



    </div>
</main>

<footer>
    <p>2024 Café Crème tous droits réservés.</p>
</footer>

</body>
</html>
