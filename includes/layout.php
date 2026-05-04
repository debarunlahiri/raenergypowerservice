<?php
require_once __DIR__ . '/icons.php';

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function render_site_start(array $company, array $navItems, string $activePage, string $title, string $description): void
{
    $baseStylesheets = [
        'assets/css/base.css',
        'assets/css/layout.css',
        'assets/css/components.css',
        'assets/css/pages/common.css',
    ];
    $pageStylesheets = [
        'home' => ['assets/css/pages/home.css'],
        'about' => ['assets/css/pages/about.css'],
        'services' => ['assets/css/pages/services.css'],
        'clients' => ['assets/css/pages/clients.css'],
        'gallery' => ['assets/css/pages/gallery.css'],
        'team' => ['assets/css/pages/team.css'],
        'career' => ['assets/css/pages/career.css'],
        'contact' => ['assets/css/pages/contact.css'],
    ];
    $stylesheets = array_merge(
        $baseStylesheets,
        $pageStylesheets[$activePage] ?? [],
        ['assets/css/responsive.css']
    );
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title) ?></title>
    <meta name="description" content="<?= e($description) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script>
        tailwind = {
            config: {
                theme: {
                    extend: {
                        fontFamily: { sans: ['Inter', 'sans-serif'] },
                        colors: {
                            brand: {
                                ink: '#111827',
                                muted: '#5b6472',
                                line: '#d9e0e8',
                                paper: '#ffffff',
                                soft: '#f4f7fa',
                                blue: '#174ea6',
                                teal: '#174ea6',
                                amber: '#f2b705',
                                red: '#c73e1d'
                            }
                        }
                    }
                },
                corePlugins: { gradientColorStops: false }
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php foreach ($stylesheets as $stylesheet): ?>
        <link rel="stylesheet" href="<?= e($stylesheet) ?>?v=<?= (int) filemtime(__DIR__ . '/../' . $stylesheet) ?>">
    <?php endforeach; ?>
</head>
<body class="page-<?= e($activePage) ?>">
    <header class="site-header" data-header>
        <a class="brand" href="index.php" aria-label="<?= e($company['name']) ?>">
            <img src="assets/images/logo.png" alt="<?= e($company['name']) ?>">
        </a>
        <button class="nav-toggle" type="button" data-nav-toggle aria-label="Open navigation" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <nav class="site-nav" data-nav>
            <?php foreach ($navItems as $key => $item): ?>
                <a class="<?= $activePage === $key ? 'is-active' : '' ?>" href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a>
            <?php endforeach; ?>
        </nav>
        <a class="header-cta" href="contact.php?request=call">Request Call</a>
    </header>
    <main>
    <?php
}

function render_page_hero(string $eyebrow, string $title, string $copy): void
{
    ?>
    <section class="page-hero reveal">
        <div class="wrap">
            <p class="eyebrow"><?= e($eyebrow) ?></p>
            <h1><?= e($title) ?></h1>
            <p><?= e($copy) ?></p>
        </div>
    </section>
    <?php
}

function render_service_card(array $service): void
{
    ?>
    <article class="service-card reveal">
        <div class="icon-box"><?php render_icon($service['icon']); ?></div>
        <h3><?= e($service['title']) ?></h3>
        <p><?= e($service['summary']) ?></p>
        <a href="services.php#<?= e($service['slug']) ?>">View scope</a>
    </article>
    <?php
}

function render_site_end(array $company, array $navItems): void
{
    ?>
    </main>
    <footer class="site-footer">
        <div class="wrap footer-grid">
            <div>
                <h2><?= e($company['name']) ?></h2>
                <p class="footer-line"><i class="fa-solid fa-bolt" aria-hidden="true"></i><span><?= e($company['tagline']) ?></span></p>
                <div class="footer-contact">
                    <a href="tel:+919038028888"><i class="fa-solid fa-phone" aria-hidden="true"></i><span><?= e($company['phone_india']) ?></span></a>
                    <a href="mailto:<?= e($company['email']) ?>"><i class="fa-solid fa-envelope" aria-hidden="true"></i><span><?= e($company['email']) ?></span></a>
                </div>
            </div>
            <div>
                <h3><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span>Offices</span></h3>
                <p class="footer-line"><i class="fa-solid fa-building" aria-hidden="true"></i><span><strong>Varanasi, India</strong><br><?= e($company['regional_office']) ?></span></p>
                <p class="footer-line"><i class="fa-solid fa-industry" aria-hidden="true"></i><span><strong>Nawalparasi, Nepal</strong><br><?= e($company['registered_office']) ?></span></p>
            </div>
            <div>
                <h3><i class="fa-solid fa-link" aria-hidden="true"></i><span>Quick Links</span></h3>
                <div class="footer-links">
                    <?php foreach ($navItems as $item): ?>
                        <a href="<?= e($item['href']) ?>"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i><span><?= e($item['label']) ?></span></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </footer>
    <button class="back-top" type="button" data-back-top aria-label="Back to top">↑</button>
    <script src="assets/js/main.js?v=<?= (int) filemtime(__DIR__ . '/../assets/js/main.js') ?>"></script>
</body>
</html>
    <?php
}
?>
