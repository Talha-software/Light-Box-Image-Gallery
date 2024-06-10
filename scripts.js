document.addEventListener('DOMContentLoaded', function () {
    const lightboxLinks = document.querySelectorAll('.lightbox');
    const lightboxOverlay = document.getElementById('lightbox-overlay');
    const lightboxImage = document.getElementById('lightbox-image');
    const closeButton = document.querySelector('.close');

    lightboxLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const imgSrc = this.href;
            lightboxImage.src = imgSrc;
            lightboxOverlay.style.display = 'flex';
        });
    });

    closeButton.addEventListener('click', function () {
        lightboxOverlay.style.display = 'none';
    });

    lightboxOverlay.addEventListener('click', function (event) {
        if (event.target === lightboxOverlay || event.target === lightboxImage) {
            lightboxOverlay.style.display = 'none';
        }
    });
});
