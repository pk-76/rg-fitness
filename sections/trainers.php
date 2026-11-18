<?php
/**
 * TRAINERS — grayscale portrait → colour on hover.
 * >>> PLACEHOLDER PHOTOS. Add real portraits as /assets/img/gym/trainer-1.jpg … trainer-4.jpg
 *     (portrait 4:5, ≥ 800×1000). Names/roles live in config.php → 'team' [CONFIRM].
 */ ?>
<section class="section section--surface grain" id="trainers" aria-labelledby="tr-title">
  <div class="container">
    <header class="section__head section__head--split reveal">
      <div>
        <p class="eyebrow">Trainers</p>
        <h2 id="tr-title" class="h2">Coached by people<br>who <em>live</em> it.</h2>
      </div>
      <p class="lead">Certified, hands-on and relentlessly invested in your progress.</p>
    </header>

    <div class="team">
      <?php foreach (cfg('team') as $i => $t): ?>
        <article class="member reveal" style="--d:<?= $i * .08 ?>s">
          <div class="member__ph">
            <?= img_tag($t['img'], 700, '', false, 'Portrait of ' . $t['name'] . ', ' . $t['role'], '(min-width:1024px) 25vw, (min-width:640px) 50vw, 100vw') ?>
            <a class="member__ig" href="<?= e($t['ig']) ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= e($t['name']) ?> on Instagram"><?= icon('instagram') ?></a>
          </div>
          <h3><?= e($t['name']) ?></h3>
          <p class="member__role"><?= e($t['role']) ?></p>
          <p class="member__focus"><?= e($t['focus']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
