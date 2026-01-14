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
