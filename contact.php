<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'contact', 'Contact | ' . $company['name'], 'Request a call or contact R.A. Energy Power Service for power plant operation, maintenance and industrial utility support.');
render_page_hero('Contact', 'Request a call from our industrial service team.', 'Share your requirement or contact our offices directly for operation, maintenance, erection and utility support.');
?>
<section class="section">
    <div class="wrap contact-grid">
        <form class="contact-form reveal" action="mailto:<?= e($company['email']) ?>" method="post" enctype="text/plain">
            <h2>Send Requirement</h2>
            <label class="field">
                <input type="text" name="name" placeholder=" " required>
                <span>Name</span>
            </label>
            <label class="field">
                <input type="tel" name="phone" placeholder=" " required>
                <span>Phone</span>
            </label>
            <label class="field">
                <input type="email" name="email" placeholder=" ">
                <span>Email</span>
            </label>
            <label class="field">
                <textarea name="message" rows="6" placeholder=" " required></textarea>
                <span>Requirement</span>
            </label>
            <button class="btn btn-primary" type="submit">Submit Request</button>
        </form>

        <aside class="contact-panel reveal">
            <h2>Contact Details</h2>
            <article>
                <strong>Phone</strong>
                <p><a href="tel:+919038028888"><?= e($company['phone_india']) ?></a></p>
                <p><a href="tel:+918527695761"><?= e($company['phone_india_alt']) ?></a></p>
            </article>
            <article>
                <strong>Email</strong>
                <p><a href="mailto:<?= e($company['email']) ?>"><?= e($company['email']) ?></a></p>
            </article>
            <article>
                <strong>India Office</strong>
                <p><?= e($company['regional_office']) ?></p>
            </article>
            <article>
                <strong>Nepal Office</strong>
                <p><?= e($company['registered_office']) ?></p>
            </article>
            <article>
                <strong>Hours</strong>
                <p><?= e($company['hours']) ?></p>
            </article>
        </aside>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
