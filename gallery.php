<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'gallery', 'Gallery | ' . $company['name'], 'Industrial plant project and service gallery for RA Energy Power Service.');
render_page_hero('Gallery', 'Field snapshots from industrial service environments.', 'Browse project, plant, erection and utility work images from RA Energy Power Service.');

$galleryItems = $galleryImages;
?>
<section class="section gallery-page-section">
    <div class="wrap">
        <div class="gallery-page-head reveal">
            <div>
                <p class="eyebrow">Project Visuals</p>
                <h2>Industrial gallery</h2>
            </div>
            <p>Images from site work, client projects and plant-side support activities.</p>
        </div>

        <div class="gallery-grid gallery-lightbox-grid">
            <?php foreach ($galleryItems as $index => $image): ?>
                <button class="gallery-item reveal" type="button" data-lightbox-index="<?= $index ?>" data-lightbox-src="<?= e($image) ?>" aria-label="Open gallery image <?= $index + 1 ?>">
                    <img src="<?= e($image) ?>" alt="Industrial project work by RA Energy" loading="lazy">
                    <span><i class="fa-solid fa-magnifying-glass-plus" aria-hidden="true"></i></span>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="image-lightbox" data-lightbox hidden>
    <button class="lightbox-close" type="button" data-lightbox-close aria-label="Close image viewer"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
    <button class="lightbox-nav lightbox-prev" type="button" data-lightbox-prev aria-label="Previous image"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i></button>
    <figure>
        <img src="" alt="Expanded gallery image" data-lightbox-image>
        <figcaption data-lightbox-caption></figcaption>
    </figure>
    <button class="lightbox-nav lightbox-next" type="button" data-lightbox-next aria-label="Next image"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
</div>
<?php render_site_end($company, $navItems); ?>
