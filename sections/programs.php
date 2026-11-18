<?php
/**
 * PROGRAMS — image cards. Hover (or tap on touch) reveals colour + description.
 * "Learn more" jumps to the trial form with the matching goal pre-selected.
 */ ?>
<section class="section" id="programs" aria-labelledby="programs-title">
  <div class="container">
    <header class="section__head reveal">
      <p class="eyebrow">Programs</p>
      <h2 id="programs-title" class="h2">Train the way<br>you were <em>built</em> to.</h2>
      <p class="lead">Six disciplines. One standard. Whatever your goal, there is a program engineered to get you there.</p>
    </header>

    <div class="programs">
      <?php foreach (cfg('programs') as $i => $p): ?>
        <a class="card reveal" style="--d:<?= ($i % 3) * .08 ?>s" href="#trial" data-goal="<?= e($p['goal']) ?>" aria-label="<?= e($p['title']) ?>: learn more">
          <?= img_tag($p['img'], 800, 'card__img', false, '', '(min-width:1024px) 33vw, (min-width:640px) 50vw, 100vw') ?>
          <div class="card__shade" aria-hidden="true"></div>
          <span class="card__no">0<?= $i + 1 ?></span>
          <div class="card__body">
            <h3><?= e($p['title']) ?></h3>
            <p><?= e($p['desc']) ?></p>
            <span class="card__more">Learn more <?= icon('arrow') ?></span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
