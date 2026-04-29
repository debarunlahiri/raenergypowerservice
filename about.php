<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'about', 'About Us | ' . $company['name'], 'History, vision and operating philosophy of R.A. Energy Power Service.');
render_page_hero('About Us', 'A trained, efficient team for industrial operation and maintenance.', 'Our work is shaped around reliable site execution, quick response to client needs and a practical understanding of power plant environments.');
?>
<section class="section">
    <div class="wrap split">
        <div class="reveal">
            <p class="eyebrow">History</p>
            <h2>Serving industrial power environments since 2006.</h2>
            <p>R.A. Energy Power Service began in India with a focused goal: create dependable field teams for power plant operation, maintenance and erection scopes. The company registered in Nepal in 2017 to support a wider industrial base.</p>
            <p>Our methodology is direct: understand the site requirement, plan manpower and supervision, execute with clear reporting, and keep plant continuity at the center of every decision.</p>
        </div>
        <div class="info-stack reveal">
            <article><strong>Mission</strong><span>Train capable teams and deliver dependable industrial execution.</span></article>
            <article><strong>Vision</strong><span>Become a trusted professional partner for value-minded clients.</span></article>
            <article><strong>Philosophy</strong><span>Advanced, reliable and cost-effective support with safety first.</span></article>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="wrap">
        <div class="section-head reveal">
            <p class="eyebrow">Working Method</p>
            <h2>How we move from site requirement to dependable support.</h2>
        </div>
        <div class="process-grid">
        <?php
        $processSteps = [
            ['title' => 'Listen', 'icon' => 'fa-solid fa-comments', 'text' => 'Understand site priorities and constraints.'],
            ['title' => 'Analyze', 'icon' => 'fa-solid fa-magnifying-glass-chart', 'text' => 'Review manpower, equipment and technical risk.'],
            ['title' => 'Plan', 'icon' => 'fa-solid fa-clipboard-list', 'text' => 'Define schedule, scope and reporting cadence.'],
            ['title' => 'Execute', 'icon' => 'fa-solid fa-helmet-safety', 'text' => 'Mobilize disciplined teams for field delivery.'],
            ['title' => 'Support', 'icon' => 'fa-solid fa-headset', 'text' => 'Close loops and respond to changing site needs.'],
        ];
        ?>
        <?php foreach ($processSteps as $step): ?>
            <article class="process-card reveal">
                <span><i class="<?= e($step['icon']) ?>" aria-hidden="true"></i></span>
                <h3><?= e($step['title']) ?></h3>
                <p><?= e($step['text']) ?></p>
            </article>
        <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
