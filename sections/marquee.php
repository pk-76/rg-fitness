<?php /** Ticker strip. Content duplicated so the CSS loop is seamless. */
$words = cfg('marquee'); ?>
<section class="marquee" aria-label="Disciplines we train">
  <div class="marquee__track">
    <?php for ($g = 0; $g < 2; $g++): ?>
      <div class="marquee__group" <?= $g ? 'aria-hidden="true"' : '' ?>>
        <?php for ($r = 0; $r < 2; $r++) foreach ($words as $w): ?>
          <span><?= e($w) ?></span><i aria-hidden="true">•</i>
        <?php endforeach; ?>
      </div>
    <?php endfor; ?>
  </div>
</section>
