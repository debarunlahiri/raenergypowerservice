<?php
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

$careerEmail = 'hr@ratechnologies.in';
$jobOpenings = [
    [
        'category' => 'Associates',
        'title' => 'Associate',
        'experience' => 'As per project requirement',
        'summary' => 'Associate-level site support roles for industrial project execution and field coordination.',
    ],
    [
        'category' => 'Associates',
        'title' => 'Sr. Structural Engineer',
        'experience' => 'Relevant structural site experience required',
        'summary' => 'Senior structural engineering support for industrial plant, structure and project execution scopes.',
    ],
    [
        'category' => 'Associates',
        'title' => 'Senior Engineer',
        'experience' => '8 years to 20 years',
        'summary' => 'Experienced engineering professionals for industrial site execution, supervision and coordination.',
    ],
    [
        'category' => 'Associates',
        'title' => 'Draftman',
        'experience' => '4 years to 10 years',
        'summary' => 'Technical drafting support for plant, structure, utility and project documentation requirements.',
    ],
];

render_site_start($company, $navItems, 'career', 'Career | ' . $company['name'], 'Career opportunities for associates, senior engineers and draftman roles at R.A. Energy Power Service.');
render_page_hero('Career', 'Join our industrial power plant service team.', 'We welcome experienced associates who can support site execution, engineering coordination and technical documentation.');
?>
<section class="section career-section">
    <div class="wrap career-layout">
        <div class="career-intro reveal">
            <p class="eyebrow">Job Category</p>
            <h2>Current openings for site associates.</h2>
            <p class="lead">R.A. Energy Power Service is accepting career profiles for experienced site and technical professionals.</p>
        </div>

        <div class="career-openings">
            <?php foreach ($jobOpenings as $index => $job): ?>
                <article class="career-role-card reveal" style="--career-index: <?= $index ?>;">
                    <div class="career-role-number"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></div>
                    <div>
                        <h3><?= e($job['title']) ?></h3>
                        <p><?= e($job['summary']) ?></p>
                    </div>
                    <strong>Experience Required: <?= e($job['experience']) ?></strong>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section career-apply-section">
    <div class="wrap career-apply reveal">
        <div>
            <p class="eyebrow">Apply Now</p>
            <h2>Drop your CV with your personal information.</h2>
            <p>Kindly send your CV to <a href="mailto:<?= e($careerEmail) ?>"><?= e($careerEmail) ?></a> with your personal information, experience details and preferred role.</p>
        </div>
        <a class="btn btn-primary" href="mailto:<?= e($careerEmail) ?>?subject=Career%20Application%20-%20R.A.%20Energy">Send CV</a>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
