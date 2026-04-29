<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

renderSiteStart(
    $company,
    'clients',
    'Clients | ' . $company['name'],
    'Clients page for R.A. Energy Power Service Pvt. Ltd. showing reference projects and client industries.'
);
renderPageHero(
    'Client references',
    'Selected industrial references across power, paper, cement, dairy, food and process sectors.',
    'Client references are organized for quick review by industry, boiler maker and installed capacity.'
);
?>
            <section class="section-space">
                <div class="container">
                    <div class="row g-4 align-items-end mb-4">
                        <div class="col-lg-7">
                            <span class="eyebrow">Coverage</span>
                            <h2 class="section-title">Industrial references across India and Nepal</h2>
                            <p class="section-copy">Paper, cement, dairy, food and industrial processing references are already represented in the current content.</p>
                        </div>
                        <div class="col-lg-5">
                            <div class="mini-cta">
                                <strong>Reference overview</strong>
                                <p>Review representative work by client, boiler maker, boiler capacity and turbine capacity.</p>
                            </div>
                        </div>
                    </div>
                    <?php if ($clientLogos): ?>
                        <div class="logo-marquee-wrap mb-5">
                            <div class="logo-marquee-track">
                                <?php foreach (array_merge($clientLogos, $clientLogos) as $index => $logo): ?>
                                    <div class="logo-marquee-item">
                                        <img src="<?= htmlspecialchars($logo) ?>" alt="Client logo <?= ($index % count($clientLogos)) + 1 ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive client-table-wrap">
                        <table class="table align-middle client-table">
                            <thead>
                                <tr>
                                    <th>Sr. Nos.</th>
                                    <th>Client</th>
                                    <th>Boiler Maker</th>
                                    <th>Boiler Capacity</th>
                                    <th>Turbine Capacity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clients as $client): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($client['sr']) ?></td>
                                        <td><?= htmlspecialchars($client['name']) ?></td>
                                        <td><?= htmlspecialchars($client['maker']) ?></td>
                                        <td><?= htmlspecialchars($client['boiler']) ?></td>
                                        <td><?= htmlspecialchars($client['turbine']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
<?php renderSiteEnd($company); ?>
