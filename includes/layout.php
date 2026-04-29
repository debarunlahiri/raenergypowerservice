<?php
function renderSiteStart(array $company, string $activePage, string $pageTitle, string $pageDescription): void
{
    $styleFiles = [
        'assets/css/base.css',
        'assets/css/home.css',
        'assets/css/pages.css',
        'assets/css/responsive.css',
    ];
    $navItems = [
        'home' => ['label' => 'Home', 'href' => 'index.php'],
        'about' => ['label' => 'About', 'href' => 'about.php'],
        'services' => ['label' => 'Services', 'href' => 'services.php'],
        'clients' => ['label' => 'Clients', 'href' => 'clients.php'],
        'team' => ['label' => 'Team', 'href' => 'team.php'],
        'contact' => ['label' => 'Contact', 'href' => 'contact.php'],
    ];
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind = {
            config: {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                            display: ['Rajdhani', 'sans-serif']
                        },
                        colors: {
                            industrial: {
                                ink: '#17202b',
                                muted: '#5d6b7a',
                                line: '#d8dee6',
                                panel: '#ffffff',
                                soft: '#f5f7fa',
                                amber: '#c78314'
                            }
                        }
                    }
                }
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php foreach ($styleFiles as $styleFile): ?>
        <?php $styleVersion = (string) filemtime(__DIR__ . '/../' . $styleFile); ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($styleFile) ?>?v=<?= htmlspecialchars($styleVersion) ?>">
    <?php endforeach; ?>
</head>
<body>
    <div class="site-shell">
        <header class="topbar py-2 border-bottom border-opacity-10">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-between gap-2 small text-uppercase topbar-text">
                    <div class="d-flex flex-wrap gap-3">
                        <span><i class="bi bi-telephone-fill me-2"></i><?= htmlspecialchars($company['phone_india']) ?></span>
                        <span><i class="bi bi-envelope-fill me-2"></i><?= htmlspecialchars($company['email']) ?></span>
                    </div>
                    <span><i class="bi bi-clock-fill me-2"></i><?= htmlspecialchars($company['hours']) ?></span>
                </div>
            </div>
        </header>

        <nav id="siteNav" class="navbar navbar-expand-lg sticky-top main-nav">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <span class="brand-mark">RA</span>
                    <span class="brand-copy">
                        <strong>Energy Power Service</strong>
                        <small>Industrial Operations Partner</small>
                    </span>
                </a>
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-lines" aria-hidden="true">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                        <?php foreach ($navItems as $key => $item): ?>
                            <li class="nav-item">
                                <a class="nav-link<?= $activePage === $key ? ' active' : '' ?>" href="<?= htmlspecialchars($item['href']) ?>"><?= htmlspecialchars($item['label']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="btn btn-warning nav-cta ms-lg-4 mt-3 mt-lg-0" href="contact.php">Request a Call</a>
                </div>
            </div>
        </nav>
        <div class="mobile-nav-backdrop" aria-hidden="true"></div>

        <main>
    <?php
}

function renderPageHero(string $eyebrow, string $title, string $copy): void
{
    ?>
            <section class="page-hero">
                <div class="container">
                    <span class="eyebrow"><?= htmlspecialchars($eyebrow) ?></span>
                    <h1 class="section-title"><?= htmlspecialchars($title) ?></h1>
                    <p class="section-copy"><?= htmlspecialchars($copy) ?></p>
                </div>
            </section>
    <?php
}

function renderSiteEnd(array $company): void
{
    $scriptVersion = (string) filemtime(__DIR__ . '/../assets/js/main.js');
    ?>
        </main>

        <footer class="footer">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7">
                        <h2><?= htmlspecialchars($company['name']) ?></h2>
                        <p>Industrial operation, maintenance, erection and utility support for power and process plants across India and Nepal.</p>
                    </div>
                    <div class="col-lg-5 text-lg-end">
                        <a href="index.php" class="footer-link me-3">Home</a>
                        <a href="mailto:<?= htmlspecialchars($company['email']) ?>" class="footer-link"><?= htmlspecialchars($company['email']) ?></a>
                    </div>
                </div>
            </div>
        </footer>

        <button type="button" class="back-to-top" aria-label="Back to top">
            <i class="bi bi-arrow-up"></i>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/main.js?v=<?= htmlspecialchars($scriptVersion) ?>"></script>
</body>
</html>
    <?php
}
