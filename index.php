<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'home', $company['name'] . ' | Industrial Power Plant Services', 'Operation, maintenance, erection and water treatment support for industrial power plants across India and Nepal.');
?>
<section class="hero-slider" data-slider>
    <?php foreach ($heroSlides as $index => $slide): ?>
        <article class="hero-slide <?= $index === 0 ? 'is-active' : '' ?>" data-slide>
            <img src="<?= e($slide['image']) ?>" alt="" loading="<?= $index === 0 ? 'eager' : 'lazy' ?>">
            <div class="wrap hero-stage">
                <div class="hero-panel">
                    <p class="eyebrow"><?= e($slide['eyebrow']) ?></p>
                    <h1><?= e($slide['title']) ?></h1>
                    <p><?= e($slide['text']) ?></p>
                    <div class="hero-actions">
                        <a class="btn btn-primary" href="services.php">Explore Services</a>
                        <a class="btn btn-secondary" href="tel:+919038018888">Discuss Requirement</a>
                    </div>
                    <div class="hero-proof-row" aria-label="Company proof points">
                        <span><strong>500+</strong> projects</span>
                        <span><strong>1000+</strong> field staff</span>
                        <span><strong>India + Nepal</strong> support</span>
                    </div>
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

<div class="hero-service-strip" aria-label="Key service areas">
    <div class="wrap hero-service-track">
        <?php foreach ($services as $service): ?>
            <a href="services.php#<?= e($service['slug']) ?>">
                <span><?php render_icon($service['icon']); ?></span>
                <?= e($service['title']) ?>
            </a>
        <?php endforeach; ?>
        <?php foreach ($services as $service): ?>
            <a class="is-marquee-copy" href="services.php#<?= e($service['slug']) ?>" aria-hidden="true" tabindex="-1">
                <span><?php render_icon($service['icon']); ?></span>
                <?= e($service['title']) ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<section class="section home-intro-section">
    <div class="wrap home-intro-grid">
        <div class="home-intro-media reveal">
            <img src="assets/images/hero3.jpg" alt="Industrial power plant field execution" loading="lazy">
            <div class="home-intro-badge">
                <strong>Field-ready</strong>
                <span>Operation, erection and utility support</span>
            </div>
        </div>
        <div class="home-intro-copy reveal">
            <p class="eyebrow">Field Execution</p>
            <h2>Industrial power support with urgency, supervision and measurable site discipline.</h2>
            <div class="home-intro-panel">
                <p>From boiler operation to heavy erection and utility systems, RA Energy places trained teams where downtime is expensive and execution has to stay controlled.</p>
                <div class="home-intro-tags">
                    <span>Shift operation</span>
                    <span>Preventive maintenance</span>
                    <span>Shutdown support</span>
                    <span>Plant reporting</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft home-capability-section">
    <div class="wrap">
        <div class="section-head reveal">
            <p class="eyebrow">Core Services</p>
            <h2>Power plant services that move from plan to site quickly.</h2>
        </div>
        <div class="home-service-grid">
            <?php foreach ($services as $index => $service): ?>
                <article class="home-service-card reveal">
                    <div class="home-service-media">
                        <img src="<?= e($carouselImages[$index] ?? $projectImages[$index] ?? 'assets/images/hero.jpg') ?>" alt="" loading="lazy">
                        <span><?php render_icon($service['icon']); ?></span>
                    </div>
                    <div class="home-service-body">
                        <h3><?= e($service['title']) ?></h3>
                        <p><?= e($service['summary']) ?></p>
                        <a href="services.php#<?= e($service['slug']) ?>">View capability</a>
                    </div>
                </article>
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

<section class="section footprint-section reveal">
    <div class="wrap footprint-wrap">
        <div class="footprint-media">
            <img src="assets/images/hero4.jpg" alt="Industrial plant footprint and field operations" loading="lazy">
            <div class="footprint-copy">
                <p class="eyebrow">Company Footprint</p>
                <h2>Established in India, expanded for Nepal, built around industrial uptime.</h2>
                <p class="lead">RA Energy Power Service supports power and process plants with trained teams for operations, maintenance, erection and connected utility systems.</p>
            </div>
        </div>
        <div class="timeline-card">
            <div><small>India</small><strong>2006</strong><span>Founded and mobilized for industrial plant support</span></div>
            <div><small>Nepal</small><strong>2017</strong><span>Registered to support regional cement and process plants</span></div>
            <div><small>Reach</small><strong>2</strong><span>Country footprint with field-ready service teams</span></div>
        </div>
    </div>
</section>

<section class="section why-section">
    <div class="wrap why-layout">
        <div class="why-intro reveal">
            <p class="eyebrow">Why Us</p>
            <h2>Industrial sites need control, not promises.</h2>
            <p>RA Energy combines practical supervision, accountable communication, scheduling discipline and a field network that can support active plant conditions.</p>
            <div class="why-signal-row" aria-label="Operational strengths">
                <span>Supervision</span>
                <span>Safety</span>
                <span>Response</span>
            </div>
        </div>
        <div class="why-grid">
            <?php foreach ($whyUs as $item): ?>
                <article class="why-card reveal">
                    <div class="why-card-icon"><?php render_icon($item['icon']); ?></div>
                    <div>
                        <h3><?= e($item['title']) ?></h3>
                        <p><?= e($item['text']) ?></p>
                    </div>
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
                <h2>Construction scopes organized for live industrial sites.</h2>
            </div>
            <p>Operation, construction, project support and maintenance scopes organized around site readiness, reporting discipline and fast response.</p>
        </div>

        <div class="quality-grid">
            <?php foreach ($qualityServices as $index => $qualityService): ?>
                <article class="quality-card <?= $index < 2 ? 'quality-card-wide' : 'quality-card-compact' ?> reveal">
                    <div class="quality-card-top">
                        <span class="quality-icon"><i class="<?= e($qualityService['icon']) ?>" aria-hidden="true"></i></span>
                        <span class="quality-pill"><?= $index < 2 ? 'Execution scope' : 'Support scope' ?></span>
                    </div>
                    <h3><?= e($qualityService['title']) ?></h3>
                    <p><?= e($qualityService['copy']) ?></p>
                    <div class="quality-tags">
                        <?php foreach (array_slice($qualityService['features'], 0, 3) as $feature): ?>
                            <span><?= e($feature) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <a href="services.php">View Details <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section home-projects-section">
    <div class="wrap">
        <div class="home-showcase-head reveal">
            <div>
                <p class="eyebrow">Projects</p>
                <h2>Recent industrial project visuals.</h2>
            </div>
            <!-- <a href="gallery.php">View Gallery</a> -->
        </div>

        <div class="home-project-grid">
            <?php foreach ($projectImages as $index => $image): ?>
                <figure class="home-project-card reveal">
                    <img src="<?= e($image) ?>" alt="RA Energy project image <?= $index + 1 ?>" loading="lazy">
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section home-clients-section">
    <div class="wrap">
        <div class="home-showcase-head reveal">
            <div>
                <p class="eyebrow">Clients</p>
                <h2>Client references and plant partners.</h2>
            </div>
            <a href="clients.php">View Clients</a>
        </div>

        <div class="home-client-grid">
            <?php foreach ($clientLogos as $index => $logo): ?>
                <figure class="home-client-card reveal">
                    <img src="<?= e($logo) ?>" alt="Client reference <?= $index + 1 ?>" loading="lazy">
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
