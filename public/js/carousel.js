document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('carouselTrack');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    if (!track) return;

    let currentPos = 0;
    const slides = document.querySelectorAll('.carousel-item');
    const slideCount = slides.length;

    // Calcul de la limite de défilement
    const getVisibleCount = () => window.innerWidth > 768 ? 3 : 1;

    const moveCarousel = (direction) => {
        const visibleCount = getVisibleCount();
        const maxScroll = slideCount - visibleCount;

        if (direction === 'next') {
            currentPos = (currentPos >= maxScroll) ? 0 : currentPos + 1;
        } else {
            currentPos = (currentPos <= 0) ? maxScroll : currentPos - 1;
        }

        const slideWidth = slides[0].offsetWidth + 20; // Largeur + gap
        track.style.transform = `translateX(-${currentPos * slideWidth}px)`;
    };

    nextBtn.addEventListener('click', () => moveCarousel('next'));
    prevBtn.addEventListener('click', () => moveCarousel('prev'));

    // Défilement automatique toutes le 5 secondes
    setInterval(() => moveCarousel('next'), 5000);
});
