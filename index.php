<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'home', $company['name'] . ' | Industrial Power Plant Services', 'Operation, maintenance, erection and water treatment support for industrial power plants across India and Nepal.');
?>
<section class="hero-slider" data-slider>
    <?php foreach ($heroSlides as $index => $slide): ?>
        <article class="hero-slide <?= $index === 0 ? 'is-active' : '' ?>" data-slide>
            <img src="<?= e($slide['image']) ?>" alt="" loading="<?= $index === 0 ? 'eager' : 'lazy' ?>">
            <div class="hero-panel">
                <p class="eyebrow"><?= e($slide['eyebrow']) ?></p>
                <h1><?= e($slide['title']) ?></h1>
                <p><?= e($slide['text']) ?></p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="services.php">Explore Services</a>
                    <a class="btn btn-secondary" href="tel:+919038028888">Discuss Requirement</a>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
    <div class="slider-controls" aria-label="Hero carousel controls">
        <?php foreach ($heroSlides as $index => $slide): ?>
            <button type="button" class="<?= $index === 0 ? 'is-active' : '' ?>" data-slide-dot aria-label="Show slide <?= $index + 1 ?>"></button>
        <?php endforeach; ?>
    </div>
</section>

<section class="section footprint-section reveal">
    <div class="wrap footprint-wrap">
        <div class="footprint-copy">
            <p class="eyebrow">Company Footprint</p>
            <h2>Established in India, expanded for Nepal, built around industrial uptime.</h2>
            <p class="lead">R.A. Energy Power Service supports power and process plants with trained teams for operations, maintenance, erection and connected utility systems.</p>
        </div>
        <div class="timeline-card">
            <div><small>India</small><strong>2006</strong><span>Founded and mobilized for industrial plant support</span></div>
            <div><small>Nepal</small><strong>2017</strong><span>Registered to support regional cement and process plants</span></div>
            <div><small>Reach</small><strong>2</strong><span>Country footprint with field-ready service teams</span></div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="wrap">
        <div class="section-head reveal">
            <p class="eyebrow">Core Services</p>
            <h2>Industrial support services planned for field conditions.</h2>
        </div>
        <div class="card-grid">
            <?php foreach ($services as $service): ?>
                <?php render_service_card($service); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section metrics-band">
    <div class="wrap metric-grid">
        <?php foreach ($metrics as $metric): ?>
            <article class="metric reveal">
                <div class="metric-icon"><i class="<?= e($metric['icon']) ?>" aria-hidden="true"></i></div>
                <div>
                    <strong><span data-count="<?= (int) $metric['value'] ?>">0</span><em><?= e($metric['suffix']) ?></em></strong>
                    <span class="metric-label"><?= e($metric['label']) ?></span>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section">
    <div class="wrap">
        <div class="section-head reveal">
            <p class="eyebrow">Why Us</p>
            <h2>Practical strengths that matter on industrial sites.</h2>
        </div>
        <div class="why-grid">
            <?php foreach ($whyUs as $item): ?>
                <article class="why-card reveal">
                    <div class="icon-box"><?php render_icon($item['icon']); ?></div>
                    <h3><?= e($item['title']) ?></h3>
                    <p><?= e($item['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section quality-services-section">
    <div class="wrap">
        <div class="quality-head reveal">
            <div>
                <p class="eyebrow">Construction Services</p>
                <h2>Our quality services</h2>
            </div>
            <p>Operation, construction, project support and maintenance scopes organized around site readiness, reporting discipline and fast response.</p>
        </div>

        <div class="quality-grid">
            <?php foreach ($qualityServices as $index => $qualityService): ?>
                <article class="quality-card reveal">
                    <div class="quality-card-top">
                        <span class="quality-icon"><i class="<?= e($qualityService['icon']) ?>" aria-hidden="true"></i></span>
                    </div>
                    <h3><?= e($qualityService['title']) ?></h3>
                    <p><?= e($qualityService['copy']) ?></p>
                    <strong><?= e($qualityService['lead']) ?></strong>
                    <ul>
                        <?php foreach ($qualityService['features'] as $feature): ?>
                            <li><?= e($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="services.php">View Details</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
