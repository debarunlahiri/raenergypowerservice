<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

renderSiteStart(
    $company,
    'about',
    'About | ' . $company['name'],
    'About page for R.A. Energy Power Service Pvt. Ltd. covering company background, mission, vision and operating profile.'
);
renderPageHero(
    'About the business',
    'A contract and industrial services company focused on practical power plant execution.',
    'R.A. Energy Power Service was established in India in 2006 and later registered in Nepal in 2017, serving industrial clients with operation, maintenance, heavy erection and water treatment support.'
);
?>
            <section class="section-space section-dark">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5">
                            <div class="stacked-panels">
                                <div class="stack-card accent-card">
                                    <span class="kicker">Company profile</span>
                                    <h2><?= htmlspecialchars($company['name']) ?></h2>
                                    <p><?= htmlspecialchars($company['tagline']) ?></p>
                                </div>
                                <div class="stack-card">
                                    <h3>Mission</h3>
                                    <p>Provide high-quality, affordable contract solutions, respond quickly to changing client needs, build long-term relationships and improve service delivery continuously.</p>
                                </div>
                                <div class="stack-card">
                                    <h3>Vision</h3>
                                    <p>Maintain a highly trained and efficient operation and maintenance team that is ready for site realities and quick in response to client concerns.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <span class="eyebrow">Company highlights</span>
                            <h2 class="section-title">Built around field execution, operational discipline and long-term industrial support.</h2>
                            <p class="section-copy">
                                R.A. Energy Power Service is structured around practical site execution, trained manpower, responsive supervision and long-term support for industrial plant operations.
                            </p>
                            <div class="row g-4 mt-2">
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <span class="info-label">Founded</span>
                                        <strong><?= htmlspecialchars($company['founded']) ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <span class="info-label">Registered in Nepal</span>
                                        <strong><?= htmlspecialchars($company['nepal_registration']) ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <span class="info-label">Working hours</span>
                                        <strong><?= htmlspecialchars($company['hours']) ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <span class="info-label">Reach</span>
                                        <strong>India and Nepal industrial sites</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="process-strip mt-4">
                                <div><span>01</span> Operate</div>
                                <div><span>02</span> Maintain</div>
                                <div><span>03</span> Erect</div>
                                <div><span>04</span> Support utilities</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-space section-grid">
                <div class="container">
                    <div class="row g-4 align-items-stretch">
                        <div class="col-lg-4">
                            <div class="tall-panel">
                                <span class="eyebrow">Why choose us</span>
                                <h2 class="section-title">Structured delivery, not generic manpower supply.</h2>
                                <p class="section-copy">Clear scopes, accountable site teams and operational discipline for clients that need dependable execution.</p>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row g-3">
                                <?php foreach ($reasons as $index => $reason): ?>
                                    <div class="col-md-6">
                                        <div class="reason-card">
                                            <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                                            <p><?= htmlspecialchars($reason) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php renderSiteEnd($company); ?>
