<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'services', 'Services | ' . $company['name'], 'Boiler operations, heavy erection, water treatment, construction and project management services.');
render_page_hero('Services', 'Detailed scopes for operation, erection, utilities and project support.', 'Each service is organized for scannable scope clarity, site accountability and practical industrial delivery.');
?>
<section class="section service-showcase-section">
    <div class="wrap service-showcase">
        <aside class="service-overview-panel reveal">
            <p class="eyebrow">Service Portfolio</p>
            <h2>Field-ready teams for critical plant work.</h2>
            <p>Explore our core service areas and the execution points that keep industrial plants controlled, documented and responsive.</p>
            <div class="service-overview-stats">
                <article><strong><?= count($services) ?></strong><span>Core services</span></article>
                <article><strong>20+</strong><span>Years experience</span></article>
            </div>
        </aside>

        <div class="service-detail-list">
        <?php foreach ($services as $index => $service): ?>
            <article class="service-detail reveal" id="<?= e($service['slug']) ?>" style="--service-index: <?= $index ?>;">
                <aside class="service-detail-rail">
                    <span class="service-number"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <div class="icon-box"><?php render_icon($service['icon']); ?></div>
                </aside>
                <div class="service-detail-main">
                    <div class="service-detail-head">
                        <div>
                            <span class="service-tag">Industrial Scope</span>
                            <h2><?= e($service['title']) ?></h2>
                            <p><?= e($service['summary']) ?></p>
                        </div>
                        <a href="contact.php?request=call&service=<?= e($service['slug']) ?>">Discuss Scope</a>
                    </div>
                    <ul class="check-list service-feature-list">
                        <?php foreach ($service['points'] as $point): ?>
                            <li><?= e($point) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>
        <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
