<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'clients', 'Clients | ' . $company['name'], 'Client references and boiler, turbine, and industrial plant service capacity table for RN Energy Power Service.');
render_page_hero('Clients', 'Client references across boiler, turbine and industrial utility work.', 'A detailed record of completed and supported plant-side work across India and Nepal.');
?>
<section class="section clients-section">
    <div class="wrap">
        <div class="clients-table-card reveal">
            <div class="clients-table-head">
                <div>
                    <p class="eyebrow">Client Data</p>
                    <h2>Our Clients</h2>
                </div>
                <p><?= count($clients) ?> listed references with boiler makers, boiler capacity and turbine capacity details.</p>
            </div>

            <div class="clients-table-scroll" role="region" aria-label="Client reference table" tabindex="0">
                <table class="clients-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Client Name</th>
                            <th>Boiler Makers</th>
                            <th>Boiler Capacity</th>
                            <th>Turbine Capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client): ?>
                            <tr>
                                <td><?= e($client['sr']) ?></td>
                                <td><?= e($client['name']) ?></td>
                                <td><?= e($client['maker']) ?></td>
                                <td><?= e($client['boiler']) ?></td>
                                <td><?= e($client['turbine']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
