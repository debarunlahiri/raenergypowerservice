<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'team', 'Our Team | ' . $company['name'], 'Leadership and technical team members at R.A. Energy Power Service.');
render_page_hero('Our Team', 'Experienced leadership for disciplined industrial execution.', 'The team combines operational experience, mechanical supervision and technical advisory capability.');
?>
<section class="section">
    <div class="wrap team-grid">
        <?php foreach ($team as $index => $member): ?>
            <article class="team-card reveal">
                <img class="team-photo-<?= $index + 1 ?>" src="<?= e($member['image']) ?>" alt="<?= e($member['name']) ?>" loading="lazy">
                <div>
                    <h2><?= e($member['name']) ?></h2>
                    <p><?= e($member['role']) ?></p>
                    <a href="tel:<?= e(str_replace([' ', '-'], '', $member['phone'])) ?>"><?= e($member['phone']) ?></a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
