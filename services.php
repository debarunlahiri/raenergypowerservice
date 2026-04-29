<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

renderSiteStart(
    $company,
    'services',
    'Services | ' . $company['name'],
    'Services page for R.A. Energy Power Service Pvt. Ltd. covering operation, maintenance, erection and utility support.'
);
renderPageHero(
    'What we do',
    'Core industrial services for plant operations, maintenance and utility support.',
    'A clear overview of the operating scope, maintenance cadence and execution support available for industrial plant teams.'
);
?>
            <section class="section-space">
                <div class="container">
                    <div class="row g-4">
                        <?php foreach ($services as $service): ?>
                            <div class="col-md-6 col-xl-3">
                                <article class="service-card h-100">
                                    <div class="service-icon"><i class="bi <?= htmlspecialchars($service['icon']) ?>"></i></div>
                                    <h3><?= htmlspecialchars($service['title']) ?></h3>
                                    <p><?= htmlspecialchars($service['text']) ?></p>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row g-4 mt-4">
                        <div class="col-lg-7">
                            <div class="detail-card">
                                <span class="eyebrow">Operations discipline</span>
                                <h3>Typical operating scope from the current RA Energy service content</h3>
                                <ul class="detail-list">
                                    <li>Operate units according to manufacturer instruction.</li>
                                    <li>Record necessary process and equipment parameters.</li>
                                    <li>Check safeties, controls and pressure switches.</li>
                                    <li>Monitor boiler efficiency and chemical consumption.</li>
                                    <li>Maintain shift reporting through structured logbooks.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="detail-card alt-card">
                                <span class="eyebrow">Maintenance cadence</span>
                                <h3>Recurring work highlighted on the service pages</h3>
                                <ul class="detail-list">
                                    <li>Gauge glass and strainer cleaning.</li>
                                    <li>Soot blower cleaning of heating surfaces.</li>
                                    <li>Pump, gland and recirculation line checks.</li>
                                    <li>Fan damper cleaning and bearing lubrication.</li>
                                    <li>Safety valve and shutdown-readiness inspection.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-space cta-band">
                <div class="container">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-8">
                            <span class="eyebrow">Next step</span>
                            <h2 class="section-title">Need operation, maintenance or utility support for an upcoming industrial project?</h2>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a class="btn btn-warning btn-lg" href="contact.php">Talk to RA Energy</a>
                        </div>
                    </div>
                </div>
            </section>
<?php renderSiteEnd($company); ?>
