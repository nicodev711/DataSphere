<div class="album py-5 bg-dark">
    <div class="container">
        <div class="row">
            <?php
//            $images = getGalleryImages();
            foreach ($images as $image) {
                renderImageCard($image);
            }
            ?>
        </div>
    </div>
</div>