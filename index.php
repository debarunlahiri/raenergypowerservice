<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

renderSiteStart(
    $company,
    'home',
    $company['name'] . ' | Industrial Power Plant Services',
    'Homepage for R.A. Energy Power Service Pvt. Ltd. with company overview, services, client references and contact details.'
);
?>
            <section class="hero-carousel-section">
                <div class="container">
                    <div id="serviceCarousel" class="carousel slide showcase-carousel" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($carouselSlides as $index => $slide): ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                    <div class="showcase-slide-grid">
                                        <div class="showcase-visual" style="background-image: url('<?= htmlspecialchars($slide['image']) ?>');"></div>
                                        <div class="showcase-content">
                                            <span class="eyebrow"><?= htmlspecialchars($slide['eyebrow']) ?></span>
                                            <h2><?= htmlspecialchars($slide['title']) ?></h2>
                                            <p><?= htmlspecialchars($slide['text']) ?></p>
                                            <div class="showcase-actions">
                                                <a class="btn btn-warning btn-lg" href="contact.php">Discuss Your Requirement</a>
                                                <div class="carousel-indicators">
                                                    <?php foreach ($carouselSlides as $indicatorIndex => $indicatorSlide): ?>
                                                        <button
                                                            type="button"
                                                            data-bs-target="#serviceCarousel"
                                                            data-bs-slide-to="<?= $indicatorIndex ?>"
                                                            class="<?= $indicatorIndex === $index ? 'active' : '' ?>"
                                                            aria-current="<?= $indicatorIndex === $index ? 'true' : 'false' ?>"
                                                            aria-label="Slide <?= $indicatorIndex + 1 ?>"
                                                        ></button>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#serviceCarousel" data-bs-slide="prev" aria-label="Previous slide">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#serviceCarousel" data-bs-slide="next" aria-label="Next slide">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </section>

            <section class="hero-section">
                <div class="container">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-7">
                            <span class="eyebrow">Industrial power plant support</span>
                            <h1>Operation, maintenance and erection support designed for continuous plant performance.</h1>
                            <p class="hero-copy">
                                Practical field teams, disciplined reporting and responsive supervision for boiler, turbine, utility and erection work across industrial sites.
                            </p>
                            <div class="d-flex flex-wrap gap-3 hero-actions">
                                <a class="btn btn-warning btn-lg" href="services.php">Explore Services</a>
                                <a class="btn btn-outline-light btn-lg" href="clients.php">View Clients</a>
                            </div>
                            <div class="row g-3 hero-metrics">
                                <div class="col-sm-4">
                                    <div class="metric-card">
                                        <strong>20+</strong>
                                        <span>Years of operational experience</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="metric-card">
                                        <strong>350+</strong>
                                        <span>Efficient and skilled employees</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="metric-card">
                                        <strong>12+</strong>
                                        <span>Representative client projects shown here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-panel">
                                <div class="hero-panel-top">
                                    <span>Founded</span>
                                    <strong><?= htmlspecialchars($company['founded']) ?></strong>
                                </div>
                                <div class="hero-panel-grid">
                                    <article>
                                        <i class="bi bi-fan"></i>
                                        <h3>Boilers</h3>
                                        <p>Operation and maintenance structured around OEM instructions and site discipline.</p>
                                    </article>
                                    <article>
                                        <i class="bi bi-lightning-charge"></i>
                                        <h3>Turbines</h3>
                                        <p>Execution support for turbine-linked systems, records and performance monitoring.</p>
                                    </article>
                                    <article>
                                        <i class="bi bi-buildings"></i>
                                        <h3>Erection</h3>
                                        <p>Heavy erection assistance across industrial plant infrastructure and equipment.</p>
                                    </article>
                                    <article>
                                        <i class="bi bi-water"></i>
                                        <h3>Utilities</h3>
                                        <p>Water treatment and utility system support for dependable plant uptime.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-space mission-vision-section">
                <div class="container">
                    <div class="mission-vision-grid">
                        <div class="mission-copy-stack">
                            <article class="mission-copy-item">
                                <span class="eyebrow">Mission</span>
                                <h2>Train capable teams and deliver dependable industrial execution.</h2>
                                <p>We develop skilled, value-driven people who can support safe plant operation, disciplined maintenance and successful project delivery.</p>
                            </article>
                            <article class="mission-copy-item">
                                <span class="eyebrow">Vision</span>
                                <h2>Become a trusted professional partner for value-minded clients.</h2>
                                <p>Our goal is to be selected for reliability, technical discipline and the ability to respond quickly to site requirements.</p>
                            </article>
                            <article class="mission-copy-item">
                                <span class="eyebrow">Philosophy</span>
                                <h2>Advanced, reliable and cost-effective support with safety first.</h2>
                                <p>We focus on practical solutions, timely service and long-term relationships built around plant uptime and safety.</p>
                            </article>
                        </div>
                        <div class="mission-visual" aria-hidden="true">
                            <div class="target-mark">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="target-arrow"></div>
                            <div class="mission-line"></div>
                            <div class="operator-mark">
                                <i class="bi bi-person-arms-up"></i>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-space values-approach-section">
                <div class="container">
                    <div class="section-heading text-center mx-auto">
                        <span class="eyebrow">How we work</span>
                        <h2 class="section-title">Values and approach that guide site execution.</h2>
                    </div>

                    <div class="values-map">
                        <article class="value-node value-left value-1">
                            <div class="value-icon"><i class="bi bi-briefcase"></i></div>
                            <div>
                                <h3>Integrity</h3>
                                <p>Do what is right and maintain transparent site communication.</p>
                            </div>
                        </article>
                        <article class="value-node value-left value-2">
                            <div class="value-icon muted"><i class="bi bi-pie-chart"></i></div>
                            <div>
                                <h3>Making a Difference</h3>
                                <p>Improve operating discipline and strengthen plant performance.</p>
                            </div>
                        </article>
                        <article class="value-node value-left value-3">
                            <div class="value-icon dark"><i class="bi bi-piggy-bank"></i></div>
                            <div>
                                <h3>Professional Growth</h3>
                                <p>Learn, innovate and lead through stronger technical capability.</p>
                            </div>
                        </article>
                        <div class="values-center-mark" aria-hidden="true">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <article class="value-node value-right value-4">
                            <div class="value-icon green"><i class="bi bi-clipboard-check"></i></div>
                            <div>
                                <h3>Respect</h3>
                                <p>Respect people, site conditions and client priorities.</p>
                            </div>
                        </article>
                        <article class="value-node value-right value-5">
                            <div class="value-icon blue"><i class="bi bi-easel"></i></div>
                            <div>
                                <h3>Open and Honest</h3>
                                <p>Collaborate clearly and build on each other&apos;s strengths.</p>
                            </div>
                        </article>
                        <article class="value-node value-right value-6">
                            <div class="value-icon pale"><i class="bi bi-list-check"></i></div>
                            <div>
                                <h3>Victory</h3>
                                <p>Take calculated risks, learn from failures and keep improving.</p>
                            </div>
                        </article>
                    </div>

                    <div class="approach-formula">
                        <div class="approach-heading">
                            <h3><span>RA</span> Approach</h3>
                            <p>Formula</p>
                        </div>
                        <div class="approach-map">
                            <div class="approach-core">
                                <span class="eyebrow">Execution workflow</span>
                                <h4>From site requirement to sustained plant support.</h4>
                                <p>Each engagement moves through a clear field-tested sequence so scope, responsibility and delivery stay controlled.</p>
                            </div>
                            <article class="approach-node approach-1"><i class="bi bi-chat-square-text"></i><span>Listen</span><p>Understand site priorities, constraints and expected outcomes.</p></article>
                            <article class="approach-node approach-2"><i class="bi bi-cpu"></i><span>Analyze</span><p>Review plant conditions, manpower needs and technical risk.</p></article>
                            <article class="approach-node approach-3"><i class="bi bi-diagram-3"></i><span>Design &amp; Plan</span><p>Define scope, schedule, supervision and reporting cadence.</p></article>
                            <article class="approach-node approach-4"><i class="bi bi-clipboard-data"></i><span>Execute</span><p>Mobilize disciplined teams with accountable site coordination.</p></article>
                            <article class="approach-node approach-5"><i class="bi bi-gear-wide-connected"></i><span>Operate &amp; Maintain</span><p>Keep equipment support consistent through practical routines.</p></article>
                            <article class="approach-node approach-6"><i class="bi bi-headset"></i><span>Deliver &amp; Support</span><p>Close loops, support continuity and respond to changing needs.</p></article>
                        </div>
                    </div>
                </div>
            </section>

            

            <section class="section-space">
                <div class="container">
                    <div class="row g-4 align-items-end">
                        <div class="col-lg-7">
                            <span class="eyebrow">Why choose us</span>
                            <h2 class="section-title">Experienced site teams for boiler, turbine, utility and erection work.</h2>
                            <p class="section-copy">R.A. Energy Power Service supports industrial plants with practical field execution, disciplined operations and maintenance coverage that helps sites run safely and consistently. From routine plant support to shutdown work, the team is built around dependable manpower and hands-on supervision.</p>
                        </div>
                        <div class="col-lg-5">
                            <div class="mini-cta">
                                <strong>Built for execution</strong>
                                <p>Since <?= htmlspecialchars($company['founded']) ?>, the company has delivered operation, maintenance, water treatment and heavy erection support for power and process industry clients across multiple sites.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-space quality-services-section">
                <div class="container">
                    <div class="quality-services-head text-center">
                        <span class="eyebrow">Construction services</span>
                        <h2 class="section-title">Our Quality Services</h2>
                    </div>

                    <div class="quality-services-shell">
                        <div class="quality-service-tabs" role="tablist" aria-label="Quality services tabs">
                            <?php foreach ($qualityServices as $index => $qualityService): ?>
                                <button
                                    class="quality-service-tab<?= $index === 0 ? ' is-active' : '' ?>"
                                    type="button"
                                    role="tab"
                                    id="quality-tab-<?= htmlspecialchars($qualityService['slug']) ?>"
                                    aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"
                                    aria-controls="quality-panel-<?= htmlspecialchars($qualityService['slug']) ?>"
                                    data-quality-target="quality-panel-<?= htmlspecialchars($qualityService['slug']) ?>"
                                >
                                    <i class="bi <?= htmlspecialchars($qualityService['icon']) ?>" aria-hidden="true"></i>
                                    <span><?= htmlspecialchars($qualityService['label']) ?></span>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <div class="quality-service-panels">
                            <?php foreach ($qualityServices as $index => $qualityService): ?>
                                <article
                                    class="quality-service-panel<?= $index === 0 ? ' is-active' : '' ?>"
                                    id="quality-panel-<?= htmlspecialchars($qualityService['slug']) ?>"
                                    role="tabpanel"
                                    aria-labelledby="quality-tab-<?= htmlspecialchars($qualityService['slug']) ?>"
                                    <?= $index === 0 ? '' : 'hidden' ?>
                                >
                                    <div class="quality-service-visual">
                                        <img src="<?= htmlspecialchars($qualityService['image']) ?>" alt="<?= htmlspecialchars($qualityService['title']) ?>">
                                    </div>
                                    <div class="quality-service-content">
                                        <span class="quality-service-kicker">Service focus</span>
                                        <h3><?= htmlspecialchars($qualityService['title']) ?></h3>
                                        <p><?= htmlspecialchars($qualityService['copy']) ?></p>
                                        <h4><?= htmlspecialchars($qualityService['lead']) ?></h4>
                                        <ul class="quality-service-list">
                                            <?php foreach ($qualityService['items'] as $item): ?>
                                                <li><?= htmlspecialchars($item) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <a class="btn btn-warning btn-lg quality-service-cta" href="<?= htmlspecialchars($qualityService['button']['href']) ?>">
                                            <?= htmlspecialchars($qualityService['button']['label']) ?>
                                        </a>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>

            
<?php renderSiteEnd($company); ?>
