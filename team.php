<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

renderSiteStart(
    $company,
    'team',
    'Team | ' . $company['name'],
    'Team page for R.A. Energy Power Service Pvt. Ltd. showing leadership and technical experts.'
);
renderPageHero(
    'Leadership and experts',
    'Leadership and technical contacts for operations, maintenance and site execution.',
    'Direct team references for clients who need accountable commercial and technical coordination.'
);
?>
            <section class="section-space section-dark">
                <div class="container">
                    <div class="section-heading text-center mx-auto">
                        <span class="eyebrow">Core team</span>
                        <h2 class="section-title">Leadership and technical contacts</h2>
                    </div>
                    <div class="row g-4">
                        <?php foreach ($team as $index => $member): ?>
                            <div class="col-md-6 col-xl-3">
                                <article class="team-card">
                                    <div class="team-photo team-photo-<?= $index + 1 ?>">
                                        <img src="<?= htmlspecialchars($member['image']) ?>" alt="<?= htmlspecialchars($member['name']) ?>">
                                    </div>
                                    <h3><?= htmlspecialchars($member['name']) ?></h3>
                                    <p><?= htmlspecialchars($member['role']) ?></p>
                                    <a href="tel:<?= preg_replace('/[^0-9+]/', '', $member['phone']) ?>"><?= htmlspecialchars($member['phone']) ?></a>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
<?php renderSiteEnd($company); ?>
