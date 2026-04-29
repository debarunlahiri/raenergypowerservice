<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

render_site_start($company, $navItems, 'career', 'Career | ' . $company['name'], 'Career opportunities for boiler operators, maintenance technicians and industrial site professionals.');
render_page_hero('Career', 'Build field capability in power plant operations and maintenance.', 'We look for disciplined, safety-aware people who can work responsibly in industrial site environments.');
?>
<section class="section">
    <div class="wrap split">
        <div class="reveal">
            <h2>Current focus areas</h2>
            <p class="lead">Applications are welcome from IBR-certified boiler operators, turbine assistants, mechanical technicians, fitters, welders and site supervisors.</p>
            <ul class="check-list">
                <li>Power plant operation and maintenance experience</li>
                <li>Comfort with shift work, reporting and safety procedures</li>
                <li>Ability to work across India and Nepal project sites</li>
                <li>Clear communication with supervisors and client teams</li>
            </ul>
        </div>
        <div class="career-box reveal">
            <h3>Send your profile</h3>
            <p>Email your resume with role, experience and preferred location.</p>
            <a class="btn btn-primary" href="mailto:<?= e($company['email']) ?>?subject=Career%20Application%20-%20R.A.%20Energy">Apply by Email</a>
        </div>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
