<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

$aboutStats = [
    ['value' => '2006', 'label' => 'Founded in India'],
    ['value' => '2017', 'label' => 'Registered in Nepal'],
    ['value' => '20+', 'label' => 'Years of site experience'],
    ['value' => '1000+', 'label' => 'Working employees'],
];

$missionPoints = [
    'Provide high-quality, affordable contract and complete solutions.',
    'Create and cultivate long-term relationships with clients.',
    'Respond immediately to changing client needs.',
    'Achieve complete customer satisfaction.',
    'Improve services continuously.',
];

$deliverySteps = [
    ['title' => 'Planning', 'icon' => 'fa-solid fa-clipboard-list', 'text' => 'Define manpower, timeline, safety and reporting needs before mobilization.'],
    ['title' => 'Design', 'icon' => 'fa-solid fa-compass-drafting', 'text' => 'Shape practical execution methods for plant-side and utility-side work.'],
    ['title' => 'Development', 'icon' => 'fa-solid fa-gears', 'text' => 'Build the operating rhythm, supervision structure and site workflow.'],
    ['title' => 'Delivery', 'icon' => 'fa-solid fa-helmet-safety', 'text' => 'Execute work with trained crews and quick response to client concerns.'],
];

$capabilities = [
    ['title' => 'Operation', 'icon' => 'fa-solid fa-industry', 'text' => 'Disciplined operating crews for boiler, turbine and connected utility environments.'],
    ['title' => 'Maintenance', 'icon' => 'fa-solid fa-screwdriver-wrench', 'text' => 'Routine, shutdown and corrective support built around plant continuity.'],
    ['title' => 'Project Management', 'icon' => 'fa-solid fa-diagram-project', 'text' => 'Structured coordination from planning and manpower to handover reporting.'],
    ['title' => 'Heavy Erection', 'icon' => 'fa-solid fa-truck-ramp-box', 'text' => 'Field execution support for equipment, structures and industrial systems.'],
    ['title' => 'Water Treatment', 'icon' => 'fa-solid fa-droplet', 'text' => 'Utility-side monitoring, dosing discipline and stable process support.'],
    ['title' => 'Complete Solutions', 'icon' => 'fa-solid fa-bolt', 'text' => 'Integrated power plant support across operation, service and project scopes.'],
];

render_site_start($company, $navItems, 'about', 'About Us | ' . $company['name'], 'Industrial operation, maintenance, heavy erection and water treatment support from R.A. Energy Power Service.');
render_page_hero('About Us', 'Complete industrial power plant support since 2006.', 'R.A. Energy Power Service is built around operation, maintenance, heavy erection, water treatment and complete power plant solutions across India and Nepal.');
?>
<section class="section about-showcase-section">
    <div class="wrap about-showcase">
        <div class="about-showcase-copy reveal">
            <p class="eyebrow">About R.A. Power Services</p>
            <h2>Industrial power support built around uptime, safety and fast site response.</h2>
            <p class="lead">R.A. Energy Power Service Pvt. Ltd. was founded in India in 2006 and registered in Nepal in 2017 to provide contract support for industrial operation, maintenance, heavy erection, water treatment and complete power plant solutions.</p>
            <p>Our team is structured for practical site execution, trained manpower, clear supervision and quick response to changing client needs.</p>
            <div class="about-actions">
                <a class="btn btn-primary" href="services.php">Explore Services</a>
                <a class="about-text-link" href="contact.php?request=call">Request Call</a>
            </div>
        </div>

        <div class="about-media-board reveal" aria-label="Industrial service visuals">
            <figure class="about-media-main">
                <img src="assets/images/gallery/33.jpeg" alt="Industrial power plant installation">
            </figure>
            <figure class="about-media-side">
                <img src="assets/images/projects/1.jpg" alt="Power plant project work">
            </figure>
            <div class="about-media-note">
                <span>Operation</span>
                <span>Maintenance</span>
                <span>Erection</span>
                <span>Water Treatment</span>
            </div>
        </div>
    </div>

    <div class="wrap about-stat-strip reveal">
        <?php foreach ($aboutStats as $stat): ?>
            <article>
                <strong><?= e($stat['value']) ?></strong>
                <span><?= e($stat['label']) ?></span>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section about-principles-section">
    <div class="wrap about-principles">
        <div class="about-principles-head reveal">
            <p class="eyebrow">Mission & Vision</p>
            <h2>Long-term client relationships backed by reliable field execution.</h2>
        </div>

        <div class="mission-vision-grid">
            <article class="mission-panel reveal">
                <span class="about-panel-icon"><i class="fa-solid fa-bullseye" aria-hidden="true"></i></span>
                <h3>Mission Statement</h3>
                <ul>
                    <?php foreach ($missionPoints as $point): ?>
                        <li><?= e($point) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
            <article class="vision-panel reveal">
                <span class="about-panel-icon"><i class="fa-solid fa-eye" aria-hidden="true"></i></span>
                <h3>Our Vision</h3>
                <p>The vision at R.A. Energy Power Service Pvt. Ltd. is to maintain a highly trained and efficient operation and maintenance team ready for anything that may occur, with quick response to client needs and concerns.</p>
            </article>
        </div>
    </div>
</section>

<section class="section about-ops-section">
    <div class="wrap about-ops-grid">
        <div class="about-ops-copy reveal">
            <p class="eyebrow">Our Skills & Experience</p>
            <h2>Management skill and work experience built for power plant delivery.</h2>
            <p>With over 20 years of field experience, the team plans work around safety, manpower readiness, site constraints and continuity of plant operations.</p>
            <div class="about-ops-proof">
                <strong>20+</strong>
                <span>Years coordinating industrial power plant operation, maintenance and site execution.</span>
            </div>
        </div>
        <div class="about-step-stack">
            <?php foreach ($deliverySteps as $index => $step): ?>
                <article class="about-step reveal">
                    <strong><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></strong>
                    <span><i class="<?= e($step['icon']) ?>" aria-hidden="true"></i></span>
                    <div>
                        <h3><?= e($step['title']) ?></h3>
                        <p><?= e($step['text']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section about-services-section">
    <div class="wrap">
        <div class="about-services-head reveal">
            <p class="eyebrow">Our Quality Services</p>
            <h2>Complete support from plant operation to project management.</h2>
            <p>We aim to be a leading contract firm for industrial operation, maintenance, heavy erection, water treatment and complete power plant solutions.</p>
        </div>
        <div class="about-service-grid">
            <?php foreach ($capabilities as $capability): ?>
                <article class="about-service-card reveal">
                    <span><i class="<?= e($capability['icon']) ?>" aria-hidden="true"></i></span>
                    <h3><?= e($capability['title']) ?></h3>
                    <p><?= e($capability['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-project-cta">
    <div class="wrap about-project-cta-inner reveal">
        <p class="eyebrow">Upcoming Project</p>
        <h2>Let’s talk about your upcoming industrial power requirement.</h2>
        <a class="btn btn-primary" href="contact.php?request=call">Contact Us</a>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
