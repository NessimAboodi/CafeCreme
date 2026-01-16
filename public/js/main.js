document.addEventListener('DOMContentLoaded', () => {

    // 1. CHANGEMENT DE NAVBAR AU SCROLL
    const navbar = document.querySelector('nav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 2. RÉVÉLATION DES ÉLÉMENTS AU DÉFILEMENT (REVEAL ON SCROLL)
    const observerOptions = {
        threshold: 0.15 // L'élément apparaît quand 15% est visible
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    // On cible tous les éléments avec la classe .reveal
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // 3. SMOOTH SCROLL POUR LES LIENS INTERNES
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
});

document.addEventListener('DOMContentLoaded', () => {
    // --- 1. GESTION DU MENU MOBILE (BURGER) ---
    const menuTrigger = document.getElementById('menu-trigger');
    const navOverlay = document.getElementById('nav-overlay');
    const body = document.body;

    if (menuTrigger && navOverlay) {
        menuTrigger.addEventListener('click', () => {
            navOverlay.classList.toggle('active');
            // Empêche le scroll derrière le menu quand il est ouvert
            body.style.overflow = navOverlay.classList.contains('active') ? 'hidden' : '';
        });

        // Fermer le menu si on clique sur un lien
        navOverlay.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navOverlay.classList.remove('active');
                body.style.overflow = '';
            });
        });
    }

    // --- 2. NAVBAR AU SCROLL ---
    const navbar = document.querySelector('nav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // --- 3. ANIMATIONS REVEAL ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
});
// --- GESTION DU MENU DÉROULANT DE LANGUE ---

// 1. Fonction pour afficher/cacher le menu spécifique (Mobile ou Desktop)
function toggleLangMenu(menuId) {
    // Ferme l'autre menu s'il est ouvert pour éviter les superpositions
    document.querySelectorAll('.lang-options').forEach(opt => {
        if (opt.id !== menuId) opt.classList.remove('show');
    });

    // Bascule l'affichage du menu cliqué
    document.getElementById(menuId).classList.toggle('show');
}

// 2. Fonction pour sélectionner la langue et traduire le site
function selectLanguage(lang) {
    const elements = document.querySelectorAll('[data-en]');
    const labels = document.querySelectorAll('.current-lang-text');

    if (lang === 'en') {
        elements.forEach(el => {
            // Sauvegarde le texte français s'il n'est pas déjà stocké
            if (!el.getAttribute('data-fr')) {
                el.setAttribute('data-fr', el.innerText);
            }
            // Remplace par la version anglaise
            el.innerText = el.getAttribute('data-en');
        });
        // Met à jour l'affichage sur tous les boutons (Desktop et Mobile)
        labels.forEach(lb => lb.innerText = 'EN');
    } else {
        elements.forEach(el => {
            // Restaure le texte français original
            const frText = el.getAttribute('data-fr');
            if (frText) el.innerText = frText;
        });
        // Remet à jour l'affichage sur FR
        labels.forEach(lb => lb.innerText = 'FR');
    }

    // Ferme tous les menus d'options après la sélection
    document.querySelectorAll('.lang-options').forEach(opt => opt.classList.remove('show'));
}

// 3. Fermer le menu si on clique n'importe où ailleurs sur la page
window.addEventListener('click', function(e) {
    if (!e.target.closest('.lang-dropdown')) {
        document.querySelectorAll('.lang-options').forEach(opt => opt.classList.remove('show'));
    }
});
