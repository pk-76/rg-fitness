<?php
/**
 * INSTAGRAM — 6-tile grid linking to the profile.
 * >>> PLACEHOLDER tiles reuse the gym photos. Replace with square crops of real posts
 *     (add keys to config.php images) or embed a feed widget later.
 */
$tiles = ['deadlift','cardio','dumbbells','rack','training','floor']; ?>
<section class="section section--tight" id="instagram" aria-labelledby="ig-title">
  <div class="container">
    <header class="section__head section__head--split reveal">
      <div>
        <p class="eyebrow">Instagram</p>
        <h2 id="ig-title" class="h2">Follow the grind<br><a href="<?= e(cfg('instagram_url')) ?>" target="_blank" rel="noopener noreferrer"><em><?= e(cfg('instagram')) ?></em></a></h2>
      </div>
      <a class="btn btn--ghost" href="<?= e(cfg('instagram_url')) ?>" target="_blank" rel="noopener noreferrer" data-magnetic><?= icon('instagram') ?> Follow on Instagram</a>
    </header>

    <div class="igrid">
      <?php foreach ($tiles as $i => $k): ?>
        <a class="igrid__tile reveal" style="--d:<?= ($i % 3) * .06 ?>s" href="<?= e(cfg('instagram_url')) ?>" target="_blank" rel="noopener noreferrer" aria-label="View RG Fitness on Instagram, post <?= $i + 1 ?>">
          <?= img_tag($k, 500, '', false, 'RG Fitness Instagram post ' . ($i + 1), '(min-width:1024px) 16vw, 33vw') ?>
          <span><?= icon('instagram') ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
