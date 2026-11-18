<?php
/**
 * RG Fitness — single-page marketing site.
 * Each section is its own file in /sections. All data comes from config.php.
 * Which sections render is controlled by config.php → 'sections'.
 */
require __DIR__ . '/includes/helpers.php';
require __DIR__ . '/includes/head.php';
?>
<body id="top">
<?php
require __DIR__ . '/includes/navbar.php';
echo '<main id="main">';
foreach (['hero','marquee','stats','programs','facilities','why','membership','trainers','testimonials','branches','trial','instagram','faq'] as $s) {
    if (section_on($s)) {
        require __DIR__ . '/sections/' . $s . '.php';
    }
}
echo '</main>';
require __DIR__ . '/includes/footer.php';
