<?php
/** Footer + floating WhatsApp (desktop) + sticky call/WhatsApp bar (mobile). */
$quick = ['Programs' => '#programs', 'Facilities' => '#facilities', 'Membership' => '#membership', 'Trainers' => '#trainers', 'Branches' => '#branches', 'FAQ' => '#faq'];
$hasLogo = is_file(__DIR__ . '/../' . cfg('logo_file'));
?>
<footer class="footer grain" id="contact">
  <div class="footer__ghost" aria-hidden="true">RG FITNESS</div>
  <div class="container footer__grid">
    <div class="footer__brand">
      <?php if ($hasLogo): ?>
        <img class="footer__logo" src="<?= e(cfg('logo_file')) ?>" width="112" height="112" alt="RG Fitness emblem: sculpting physiques" loading="lazy" decoding="async">
      <?php else: ?>
        <a class="wordmark wordmark--lg" href="#top"><span>RG</span> FITNESS</a>
      <?php endif; ?>
      <p><?= e(cfg('tagline')) ?></p>
      <a class="footer__ig" href="<?= e(cfg('instagram_url')) ?>" target="_blank" rel="noopener noreferrer" aria-label="RG Fitness on Instagram">
        <?= icon('instagram') ?> <?= e(cfg('instagram')) ?>
      </a>
    </div>

    <?php foreach (cfg('branches') as $b): ?>
    <div class="footer__col">
      <h3><?= e($b['short']) ?> Branch</h3>
      <address>
        <?= implode('<br>', array_map('e', $b['lines'])) ?>
      </address>
      <p class="footer__time"><?= icon('clock') ?> <?= e($b['timings']) ?></p>
    </div>
    <?php endforeach; ?>

    <div class="footer__col">
      <h3>Quick links</h3>
      <ul>
        <?php foreach ($quick as $l => $h): ?><li><a href="<?= $h ?>"><?= e($l) ?></a></li><?php endforeach; ?>
      </ul>
      <a class="footer__phone" href="<?= e(tel_href()) ?>"><?= e(cfg('phone_display')) ?></a>
    </div>
  </div>

  <div class="container footer__bar">
    <p>© <?= e(cfg('year')) ?> RG Fitness, Jamshedpur. All rights reserved.</p>
    <p>Listed on <?= e(cfg('listed_on')) ?> · Rated <?= e(cfg('rating')) ?>★ on Google (<?= e(cfg('rating_count')) ?>) &amp; Justdial (<?= e(cfg('justdial_count')) ?>)</p>
  </div>
</footer>

<!-- Floating WhatsApp (desktop) -->
<a class="wa-float" href="<?= e(wa_href('Hi RG Fitness, I have a question about membership.')) ?>" target="_blank" rel="noopener" aria-label="Chat with RG Fitness on WhatsApp">
  <?= icon('whatsapp') ?><span>Chat with us</span>
</a>

<!-- Sticky bottom bar (mobile) -->
<div class="dock" role="navigation" aria-label="Quick contact">
  <a class="dock__call" href="<?= e(tel_href()) ?>"><?= icon('phone') ?> Call</a>
  <a class="dock__wa" href="<?= e(wa_href('Hi RG Fitness, I want to book a free trial.')) ?>" target="_blank" rel="noopener"><?= icon('whatsapp') ?> WhatsApp</a>
</div>

<script>
  // Business data handed to the front-end (from config.php): WhatsApp number only.
  window.RG = { wa: <?= json_encode(cfg('whatsapp')) ?> };
</script>
<script src="assets/js/main.js?v=<?= filemtime(__DIR__ . '/../assets/js/main.js') ?>" defer></script>
</body>
</html>
