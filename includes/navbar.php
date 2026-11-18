<?php
/**
 * Navbar: transparent over hero → solid + blur on scroll. Full-screen mobile overlay.
 * Links only appear for sections that are enabled in config.php → 'sections'.
 */
// Logo badge shown beside the wordmark when the logo file exists.
$logoFile = cfg('logo_file');
$logoTag  = is_file(__DIR__ . '/../' . $logoFile)
    ? '<img class="wordmark__logo" src="' . e($logoFile) . '" width="44" height="44" alt="" decoding="async">'
    : '';

// label => [anchor, section that must be enabled]
$all = [
    'Programs'   => ['#programs',   'programs'],
    'Facilities' => ['#facilities', 'facilities'],
    'Membership' => ['#membership', 'membership'],
    'Trainers'   => ['#trainers',   'trainers'],
    'Branches'   => ['#branches',   'branches'],
    'Contact'    => ['#trial',      'trial'],
];
$links = [];
foreach ($all as $label => [$href, $sec]) {
    if (section_on($sec)) {
        $links[$label] = $href;
    }
}
// Nav CTA: jump to the form if it exists, otherwise straight to WhatsApp.
$ctaHref  = section_on('trial') ? '#trial' : wa_href('Hi RG Fitness, I want to book a free trial.');
$ctaAttrs = section_on('trial') ? '' : ' target="_blank" rel="noopener"';
?>
<a class="skip" href="#main">Skip to content</a>

<header class="nav" id="nav">
  <div class="container nav__in">
    <a class="wordmark" href="#top" aria-label="RG Fitness, back to top"><?= $logoTag ?><b><span>RG</span> FITNESS</b></a>

    <?php if ($links): ?>
    <nav class="nav__links" aria-label="Primary">
      <?php foreach ($links as $label => $href): ?>
        <a href="<?= $href ?>"><?= e($label) ?></a>
      <?php endforeach; ?>
    </nav>
    <?php endif; ?>

    <a class="btn btn--red btn--sm nav__cta<?= $links ? '' : ' nav__cta--always' ?>" href="<?= e($ctaHref) ?>"<?= $ctaAttrs ?> data-magnetic>Book Free Trial</a>

    <?php if ($links): ?>
    <button class="nav__burger" id="burger" aria-label="Open menu" aria-expanded="false" aria-controls="menu">
      <?= icon('menu') ?><?= icon('close') ?>
    </button>
    <?php endif; ?>
  </div>
</header>

<?php if ($links): ?>
<!-- Mobile full-screen menu -->
<div class="menu" id="menu" aria-hidden="true">
  <div class="menu__bg grain"></div>
  <div class="container menu__in">
    <nav aria-label="Mobile">
      <?php $n = 0; foreach ($links as $label => $href): $n++; ?>
        <a href="<?= $href ?>" style="--i:<?= $n ?>"><small><?= str_pad((string) $n, 2, '0', STR_PAD_LEFT) ?></small><?= e($label) ?></a>
      <?php endforeach; ?>
    </nav>
    <div class="menu__foot" style="--i:8">
      <a class="btn btn--red" href="<?= e($ctaHref) ?>"<?= $ctaAttrs ?>>Book Free Trial</a>
      <a class="menu__phone" href="<?= e(tel_href()) ?>"><?= icon('phone') ?> <?= e(cfg('phone_display')) ?></a>
    </div>
  </div>
</div>
<?php endif; ?>
