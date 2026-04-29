<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'services', 'Services | ' . $company['name'], 'Boiler operations, heavy erection, water treatment, construction and project management services.');
render_page_hero('Services', 'Detailed scopes for operation, erection, utilities and project support.', 'Each service is organized for scannable scope clarity, site accountability and practical industrial delivery.');
?>
<section class="section">
    <div class="wrap service-detail-list">
        <?php foreach ($services as $index => $service): ?>
            <article class="service-detail reveal" id="<?= e($service['slug']) ?>">
                <aside class="service-detail-rail">
                    <div class="icon-box"><?php render_icon($service['icon']); ?></div>
                </aside>
                <div class="service-detail-main">
                    <div class="service-detail-head">
                        <div>
                            <h2><?= e($service['title']) ?></h2>
                            <p><?= e($service['summary']) ?></p>
                        </div>
                        <a href="tel:+919038028888">Discuss Scope</a>
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
</section>
<?php render_site_end($company, $navItems); ?>
