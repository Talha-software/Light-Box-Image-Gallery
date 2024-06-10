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
        $images = ['bmw.jpg', 'crown.jpg', 'rs.webp'];
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
        <img class="lightbox-image" id="lightbox-image">
    </div>

    <script src="scripts.js"></script>
</body>
</html>
