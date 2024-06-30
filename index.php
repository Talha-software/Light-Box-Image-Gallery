<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightbox Image Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="gallery">
        <?php
        $images = ['bmw.jpg', 'crown.jpg','dodge.jpg','BMW.jpg','civic.jpg'];
        foreach ($images as $image) {
            echo '<div class="gallery-item">';
            echo '<a href="' . $image . '" class="lightbox">';
            echo '<img src="' . $image . '" alt="Image">';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>

    <div id="lightbox-overlay">
        <span class="close">&times;</span>
        <span class="prev">&lt;</span>
        <img class="lightbox-image" id="lightbox-image">
        <span class="next">&gt;</span>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lightboxLinks = document.querySelectorAll('.lightbox');
            const lightboxOverlay = document.getElementById('lightbox-overlay');
            const lightboxImage = document.getElementById('lightbox-image');
            const closeButton = document.querySelector('.close');
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');
            let currentIndex = 0;

            const images = Array.from(lightboxLinks).map(link => link.href);

            function showImage(index) {
                lightboxImage.src = images[index];
                lightboxOverlay.style.display = 'flex';
            }

            lightboxLinks.forEach((link, index) => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    currentIndex = index;
                    showImage(currentIndex);
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

            prevButton.addEventListener('click', function () {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
                showImage(currentIndex);
            });

            nextButton.addEventListener('click', function () {
                currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
                showImage(currentIndex);
            });

            document.addEventListener('keydown', function (event) {
                if (lightboxOverlay.style.display === 'flex') {
                    if (event.key === 'ArrowLeft') {
                        prevButton.click();
                    } else if (event.key === 'ArrowRight') {
                        nextButton.click();
                    } else if (event.key === 'Escape') {
                        closeButton.click();
                    }
                }
            });
        });
    </script>
</body>
</html>
