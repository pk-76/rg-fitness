<?php
/**
 * <head>: SEO, Open Graph, Twitter, JSON-LD (both branches + FAQ), fonts, CSS.
 */
$site   = rtrim(cfg('site_url'), '/');
$title  = 'RG Fitness | Best Gym in Kadma & Sonari, Jamshedpur';
$desc   = 'RG Fitness is Jamshedpur\'s premium gym with two branches in Kadma and Sonari. Strength training, CrossFit, Zumba, sauna, cardio and personal training. Book a free trial today.';
$ogImg  = img_abs(cfg('hero_image'), 1200);
$logo   = cfg('logo_file');
$hasLogo = is_file(__DIR__ . '/../' . $logo);

// ── JSON-LD: one HealthClub per branch ───────────────────────────────────
$amenities = [];
foreach (['Strength training','Cardio','CrossFit','Zumba','Sauna','Air-conditioned floor','Lockers','Steam and shower','Free WiFi','Personal training','Wheelchair-accessible entrance'] as $a) {
    $amenities[] = ['@type' => 'LocationFeatureSpecification', 'name' => $a, 'value' => true];
}
$graph = [];
foreach (cfg('branches') as $b) {
    $graph[] = [
        '@type'     => ['HealthClub', 'LocalBusiness'],
        '@id'       => $site . '/#' . $b['id'],
        'name'      => 'RG Fitness – ' . $b['short'],
        'description' => $desc,
        'url'       => $site . '/',
        'image'     => $ogImg,
        'telephone' => cfg('phone_tel'),
        'priceRange'=> '₹₹',
        'address'   => [
            '@type' => 'PostalAddress',
            'streetAddress' => $b['street'],
            'addressLocality' => 'Jamshedpur',
            'addressRegion' => 'Jharkhand',
            'postalCode' => $b['postal'],
            'addressCountry' => 'IN',
        ],
        'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $b['lat'], 'longitude' => $b['lng']],
        'openingHoursSpecification' => [[
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => cfg('open_days'),
            'opens' => $b['opens'],
            'closes' => $b['closes'],
        ]],
        'amenityFeature' => $amenities,
        'sameAs' => [cfg('instagram_url')],
    ];
}
$faqLd = ['@type' => 'FAQPage', 'mainEntity' => array_map(fn($f) => [
    '@type' => 'Question', 'name' => $f['q'],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
], cfg('faq'))];
$graph[] = $faqLd;
$ld = ['@context' => 'https://schema.org', '@graph' => $graph];

$cssVer = filemtime(__DIR__ . '/../assets/css/style.css');
$jsVer  = filemtime(__DIR__ . '/../assets/js/main.js');
?>
<!DOCTYPE html>
<html lang="en-IN" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($desc) ?>">
<meta name="theme-color" content="#0B0B0C">
<link rel="canonical" href="<?= e($site) ?>/">
<?php if ($hasLogo): ?><link rel="icon" href="<?= e($logo) ?>" type="<?= str_ends_with($logo, '.png') ? 'image/png' : 'image/jpeg' ?>">
<link rel="apple-touch-icon" href="<?= e($logo) ?>">
<?php else: ?><link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='12' fill='%230B0B0C'/%3E%3Ctext x='32' y='43' font-family='Impact,Arial' font-size='30' text-anchor='middle' fill='%23E10600'%3ERG%3C/text%3E%3C/svg%3E">
<?php endif; ?>

<!-- Open Graph / Twitter -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="RG Fitness">
<meta property="og:locale" content="en_IN">
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($desc) ?>">
<meta property="og:url" content="<?= e($site) ?>/">
<meta property="og:image" content="<?= e($ogImg) ?>">
<meta property="og:image:alt" content="RG Fitness training floor, Jamshedpur">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($title) ?>">
<meta name="twitter:description" content="<?= e($desc) ?>">
<meta name="twitter:image" content="<?= e($ogImg) ?>">

<!-- Fonts: Anton (display) + Inter (body). Non-blocking. -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://images.unsplash.com" crossorigin>
<link rel="preload" as="image" href="<?= e(img_url(cfg('hero_image'), 1600)) ?>" fetchpriority="high">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@400;500;600;700&display=swap">
<link rel="stylesheet" href="assets/css/style.css?v=<?= $cssVer ?>">
<script>document.documentElement.className='js';</script>

<script type="application/ld+json"><?= json_encode($ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
</head>
