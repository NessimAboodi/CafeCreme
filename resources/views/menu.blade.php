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

<main class="menu-page">
    <header class="menu-header">
        <h1>La Carte du Café Crème</h1>
        <p>CHEZ NOUS ÇA PASSE CRÈME !</p>
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
                    <h3>(NOT SURE )HAPPY HOUR — 7.50€</h3>
                    <p>Tapas du jour + Bière 50cl au choix (Blonde ou Cerise)</p>
                </div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title"> Superfood Bar</h2>
            <p class="category-subtitle">Lait végétal disponible : +0.50€</p>
            <div class="menu-grid">
                <div class="menu-item"><span>Matcha Latte</span><span class="price">5.50€</span></div>
                <div class="menu-item"><span>Mango Matcha Latte</span><span class="price">6.50€</span></div>
                <div class="menu-item"><span>Pink Matcha Latte</span><span class="price">6.50€</span></div>
                <div class="menu-item"><span>Chaï Latte</span><span class="price">5.50€</span></div>
                <div class="menu-item"><span>Golden Latte</span><span class="price">5.50€</span></div>
                <div class="menu-item"><span>Pink Black/Blue Latte</span><span class="price">5.50€</span></div>
                <div class="menu-item"><span>Ube Latte</span><span class="price">5.50€</span></div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title"> Coffee Shop</h2>
            <div class="menu-grid">
                <div class="menu-item"><span>Espresso</span><span class="price">1.90€</span></div>
                <div class="menu-item"><span>Lungo</span><span class="price">2.20€</span></div>
                <div class="menu-item"><span>Doppio</span><span class="price">2.80€</span></div>
                <div class="menu-item"><span>Cappuccino</span><span class="price">3.50€</span></div>
                <div class="menu-item"><span>Latte</span><span class="price">4.50€</span></div>
                <div class="menu-item"><span>Thé</span><span class="price">3.80€</span></div>
                <div class="menu-item"><span>Chocolat Chaud</span><span class="price">4.20€</span></div>
                <div class="menu-item"><span>Chocolat Viennois</span><span class="price">4.50€</span></div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title"> Boissons Fraîches & Bar</h2>
            <div class="menu-grid">
                <div class="menu-item"><span>Sirop</span><span class="price">2.50€</span></div>

                <div class="menu-item"><span>Jus de fruit</span><span class="price">3.50€</span></div>
                <div class="menu-item"><span>Citronnade Maison</span><span class="price">3.30€</span></div>
                <div class="menu-item"><span>Coca Cola Zero / Schweppes</span><span class="price">3.00€</span></div>
                <div class="menu-item"><span>Eau Pétillante</span><span class="price">1.50€</span></div>
                <div class="menu-item"><span>RedBull</span><span class="price">2.50€</span></div>
                <div class="menu-item"><span>Blonde Pélican (25cl / 50cl)</span><span class="price">4.50€ / 8.00€</span></div>
                <div class="menu-item"><span>Rouge Mort Subite (25cl / 50cl)</span><span class="price">5.00€ / 8.50€</span></div>
                <div class="menu-item"><span>Cocktail Création / Spritz</span><span class="price">6.00€</span></div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title">Côté Salé</h2>
            <div class="menu-grid">
                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name">Bagel Saumon</span>
                        <p class="item-desc">Cream cheese, aneth, citron, salade, concombre</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name">Bagel Burrata</span>
                        <p class="item-desc">Burrata truffée, pesto rosso, jambon de Parme</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name">Bagel Poulet (Halal)</span>
                        <p class="item-desc">Sauce creamy curry maison, guacamole, salade</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                
                </div>
                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name">Focaccia (Saumon, Végé ou Jambon Cru)</span>
                        <p class="item-desc">Recettes garnies avec produits frais et salade</p>
                    </div>
                    <span class="price">8.50€</span>

            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title"> Salades & Bowls</h2>
            <div class="menu-grid">
                <div class="menu-item">
                    <div class="item-info">
                        <span class="item-name">Salade Grecque</span>
                        <p class="item-desc">Concombre, tomate, olive noire, feta</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                <div class="menu-item">
                    <div class="item-info">
                        <span class="item-name">Salade Caesar</span>
                        <p class="item-desc">Poulet rôti, tomate, croûtons, emmental</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                <div class="menu-item"><span>Poke Bowl (à composer)</span><span class="price">7.50€</span></div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title"> Les Douceurs</h2>
            <div class="menu-grid">
                <div class="menu-item">
                    <div class="item-info">
                        <span class="item-name">Pancake (saveur au choix)</span>
                        <p class="item-desc">Chocolat, Spéculoos, Caramel, Pistache</p>
                    </div>
                    <span class="price">6.50€</span>
                </div>
                <div class="menu-item">
                    <div class="item-info">
                        <span class="item-name">Bowl Maison (Overnight avoine)</span>
                        <p class="item-desc">Lait de coco, fromage, fruits rouges</p>
                    </div>
                    <span class="price">4.50€</span>
                </div>
                <div class="menu-item"><span>Matcha Pudding</span><span class="price">4.50€</span></div>
                <div class="menu-item"><span>Cookie Maison</span><span class="price">8.50€</span></div>
                <div class="menu-item"><span>Cake de la semaine</span><span class="price">8.50€</span></div>
            </div>
        </section>
    </div>
</main>



<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>


<footer>
    <div class="container footer-grid">
        <div class="footer-col">
            <h3>NOUS TROUVER</h3>
            <p><i class="fas fa-map-marker-alt"></i> 12 Rue Professeur Rollet<br>69008 Lyon</p>
            <p><i class="fas fa-phone"></i> +33 09 86 15 66 57</p>
        </div>

        <div class="footer-col">
            <h3>EXPLORER</h3>
            <ul>
                <li><a href="{{ route('home') }}">ACCUEIL</a></li>
                <li><a href="{{ route('menu') }}">LA CARTE</a></li>
                <li><a href="{{ route('reservation') }}">RÉSERVATION</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3>SUIVEZ-NOUS</h3>
            <div class="footer-socials">
                <a href="https://www.instagram.com/cafecreme_lyon/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2026 Café Crème - Lyon 8e | <a href="{{ route('terms') }}" class="small-terms">Nos Conditions</a></p>
    </div>
</footer>
