<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

renderSiteStart(
    $company,
    'contact',
    'Contact | ' . $company['name'],
    'Contact page for R.A. Energy Power Service Pvt. Ltd. with offices, contact details and inquiry form.'
);
renderPageHero(
    'Contact',
    'Regional and registered offices with direct inquiry details.',
    'Reach the company for operation, maintenance, erection and utility support requirements.'
);
?>
            <section class="section-space">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="contact-stack">
                                <div class="contact-card">
                                    <h3>Registered Office</h3>
                                    <p><?= htmlspecialchars($company['registered_office']) ?></p>
                                </div>
                                <div class="contact-card">
                                    <h3>Regional Office</h3>
                                    <p><?= htmlspecialchars($company['regional_office']) ?></p>
                                </div>
                                <div class="contact-card">
                                    <h3>Call or email</h3>
                                    <p><a href="tel:+919038028888"><?= htmlspecialchars($company['phone_india']) ?></a></p>
                                    <p><a href="tel:+918527695761"><?= htmlspecialchars($company['phone_india_alt']) ?></a></p>
                                    <p><a href="tel:+9779806925595"><?= htmlspecialchars($company['phone_nepal']) ?></a></p>
                                    <p><a href="mailto:<?= htmlspecialchars($company['email']) ?>"><?= htmlspecialchars($company['email']) ?></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="inquiry-panel">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="Your name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="name@example.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" placeholder="+91">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Service</label>
                                        <select class="form-select">
                                            <option selected>Choose a service</option>
                                            <option>Boiler & Turbine Operation</option>
                                            <option>Maintenance Services</option>
                                            <option>Heavy Erection</option>
                                            <option>Water Treatment Solutions</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Project details</label>
                                        <textarea class="form-control" rows="5" placeholder="Briefly describe the plant, scope and location"></textarea>
                                    </div>
                                    <div class="col-12 d-flex flex-wrap gap-3 align-items-center">
                                        <button class="btn btn-warning btn-lg" type="button">Send Inquiry</button>
                                        <small class="text-body-secondary">UI-only form. Connect this to PHP mail or a CRM endpoint when ready.</small>
                                    </div>
                                </div>
                                <div class="map-frame mt-4">
                                    <iframe title="RA Energy office map" src="https://www.google.com/maps?q=Sunwal-5%20Bankatti%20Nawalparasi&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php renderSiteEnd($company); ?>
