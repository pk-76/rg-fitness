<?php /** WHY RG FITNESS — light contrast break: big image left, numbered points right. */ ?>
<section class="section section--paper why" aria-labelledby="why-title">
  <div class="container why__grid">
    <div class="why__media reveal">
      <?= img_tag('deadlift', 900, '', false, null, '(min-width:1024px) 45vw, 100vw') ?>
      <div class="why__stamp"><strong>5.0★</strong><span><?= e(cfg('rating_source')) ?> · <?= e(cfg('rating_count')) ?> reviews</span></div>
    </div>

    <div class="why__body">
      <p class="eyebrow eyebrow--dark reveal">Why RG Fitness</p>
      <h2 id="why-title" class="h2 reveal">The standard<br>other gyms <em>chase.</em></h2>
      <ol class="why__list">
        <?php foreach (cfg('why') as $i => $w): ?>
          <li class="reveal" style="--d:<?= $i * .08 ?>s">
            <span class="why__no"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
            <div><h3><?= e($w['t']) ?></h3><p><?= e($w['d']) ?></p></div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
</section>
