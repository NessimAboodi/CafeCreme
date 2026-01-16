<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Complet - Café Crème</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .item-name, .price, h3, .menu-item span {
            font-weight: 400 !important;
        }
        .item-desc {
            font-weight: 400;
        }
    </style>
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

        <section class="menu-section formulas">
            <h2 class="category-title" data-en="🌟 Our Formulas">🌟 Nos Formules</h2>
            <div class="formula-grid">
                <div class="formula-box">
                    <h3 data-en="BRUNCH — 25€">BRUNCH — 25€</h3>
                    <p data-en="Unlimited lemonade + Hot drink + Savory Focaccia with salad + Dessert (Pancake or Bowl)">Citronnade à volonté + Boisson chaude + Focaccia salée avec salade + Dessert (Pancake ou Bowl)</p>
                </div>
                <div class="formula-box">
                    <h3 data-en="SNACK FORMULA — 6.50€">FORMULE GOÛTER — 6.50€</h3>
                    <p data-en="From 3pm. Pastry of the day + Hot drink of choice (+2€ for Superfood)">Dès 15h. Pâtisserie du jour + Boisson chaude au choix (+2€ pour Superfood)</p>
                </div>
                <div class="formula-box">
                    <h3 data-en="HAPPY HOUR — 7.50€">HAPPY HOUR — 7.50€</h3>
                    <p data-en="Tapas of the day + 50cl Beer of choice (Blonde or Cherry)">Tapas du jour + Bière 50cl au choix (Blonde ou Cerise)</p>
                </div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title" data-en="Savory Side">Côté Salé</h2>
            <div class="menu-grid">
                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name" data-en="Salmon Bagel">Bagel Saumon</span>
                        <p class="item-desc" data-en="Cream cheese, dill, lemon, salad, cucumber">Cream cheese, aneth, citron, salade, concombre</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name" data-en="Burrata Bagel">Bagel Burrata</span>
                        <p class="item-desc" data-en="Truffled burrata, pesto rosso, Parma ham">Burrata truffée, pesto rosso, jambon de Parme</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name" data-en="Chicken Bagel (Halal)">Bagel Poulet (Halal)</span>
                        <p class="item-desc" data-en="Homemade creamy curry sauce, guacamole, salad">Sauce creamy curry maison, guacamole, salade</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>

                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name" data-en="Panini">Panini</span>
                        <p class="item-desc" data-en="Green pesto, mozzarella, halal turkey ham">Pesto vert, mozzarella, jambon dinde halal</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>

                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name" data-en="Croq">Croq</span>
                        <p class="item-desc" data-en="Truffle oil, mozzarella, halal turkey ham">Huile de truffe, mozzarella, jambon dinde halal</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>

                <div class="menu-item full">
                    <div class="item-info">
                        <span class="item-name" data-en="Focaccia (Salmon, Veggie or Cured Ham)">Focaccia (Saumon, Végé ou Jambon Cru)</span>
                        <p class="item-desc" data-en="Recipes garnished with fresh products and salad">Recettes garnies avec produits frais et salade</p>
                    </div>
                    <span class="price">8.50€</span>
                </div>


            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title" data-en="Salads & Bowls"> Salades & Bowls</h2>
            <div class="menu-grid">
                <div class="menu-item">
                    <div class="item-info">
                        <span class="item-name" data-en="Greek Salad">Salade Grecque</span>
                        <p class="item-desc" data-en="Cucumber, tomato, black olive, feta">Concombre, tomate, olive noire, feta</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                <div class="menu-item">
                    <div class="item-info">
                        <span class="item-name" data-en="Caesar Salad">Salade Caesar</span>
                        <p class="item-desc" data-en="Roasted chicken, tomato, croutons, emmental">Poulet rôti, tomate, croûtons, emmental</p>
                    </div>
                    <span class="price">7.50€</span>
                </div>
                <div class="menu-item"><span data-en="Poke Bowl (to compose)">Poke Bowl (à composer)</span><span class="price">7.50€</span></div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title" data-en="Superfood Bar"> Superfood Bar</h2>
            <p class="category-subtitle" data-en="Plant-based milk available: +0.50€">Lait végétal disponible : +0.50€</p>
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
            <h2 class="category-title" data-en="Coffee Shop"> Coffee Shop</h2>
            <div class="menu-grid">
                <div class="menu-item"><span data-en="Espresso">Espresso</span><span class="price">1.90€</span></div>
                <div class="menu-item"><span data-en="Lungo">Lungo</span><span class="price">2.20€</span></div>
                <div class="menu-item"><span data-en="Doppio">Doppio</span><span class="price">2.80€</span></div>
                <div class="menu-item"><span data-en="Cappuccino">Cappuccino</span><span class="price">3.50€</span></div>
                <div class="menu-item"><span data-en="Latte">Latte</span><span class="price">4.50€</span></div>
                <div class="menu-item"><span data-en="Tea">Thé</span><span class="price">3.80€</span></div>
                <div class="menu-item"><span data-en="Hot Chocolate">Chocolat Chaud</span><span class="price">4.20€</span></div>
                <div class="menu-item"><span data-en="Viennese Chocolate">Chocolat Viennois</span><span class="price">4.50€</span></div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title" data-en="Cold Drinks & Bar"> Boissons Fraîches & Bar</h2>
            <div class="menu-grid">
                <div class="menu-item"><span data-en="Syrup">Sirop</span><span class="price">2.50€</span></div>
                <div class="menu-item"><span data-en="Fruit Juice">Jus de fruit</span><span class="price">3.50€</span></div>
                <div class="menu-item"><span data-en="Homemade Lemonade">Citronnade Maison</span><span class="price">3.30€</span></div>
                <div class="menu-item"><span>Coca Cola Zero / Schweppes</span><span class="price">3.00€</span></div>
                <div class="menu-item"><span data-en="Sparkling Water">Eau Pétillante</span><span class="price">1.50€</span></div>
                <div class="menu-item"><span>RedBull</span><span class="price">2.50€</span></div>
                <div class="menu-item"><span data-en="Blonde Pelican (25cl / 50cl)">Blonde Pélican (25cl / 50cl)</span><span class="price">4.50€ / 8.00€</span></div>
                <div class="menu-item"><span data-en="Red Mort Subite (25cl / 50cl)">Rouge Mort Subite (25cl / 50cl)</span><span class="price">5.00€ / 8.50€</span></div>
                <div class="menu-item"><span data-en="Creation Cocktail / Spritz">Cocktail Création / Spritz</span><span class="price">6.00€</span></div>
            </div>
        </section>

        <section class="menu-section">
            <h2 class="category-title" data-en="Sweets"> Les Douceurs</h2>
            <div class="menu-grid">
                <div class="menu-item">
                    <div class="item-info">
                        <span class="item-name" data-en="Pancake (flavor of choice)">Pancake (saveur au choix)</span>
                        <p class="item-desc" data-en="Chocolate, Speculoos, Caramel, Pistachio">Chocolat, Spéculoos, Caramel, Pistache</p>
                    </div>
                    <span class="price">6.50€</span>
                </div>
                <div class="menu-item">
                    <div class="item-info">
                        <span class="item-name" data-en="House Bowl (Overnight oat)">Bowl Maison (Overnight avoine)</span>
                        <p class="item-desc" data-en="Coconut milk, cheese, red fruits">Lait de coco, fromage, fruits rouges</p>
                    </div>
                    <span class="price">4.50€</span>
                </div>
                <div class="menu-item"><span>Matcha Pudding</span><span class="price">4.50€</span></div>
                <div class="menu-item"><span data-en="Homemade Cookie">Cookie Maison</span><span class="price">8.50€</span></div>
                <div class="menu-item"><span data-en="Cake of the week">Cake de la semaine</span><span class="price">8.50€</span></div>
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
