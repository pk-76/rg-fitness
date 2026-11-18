<?php /** BRANCHES — two cards with embedded Google Map (lazy), directions + call. */ ?>
<section class="section section--surface grain" id="branches" aria-labelledby="br-title">
  <div class="container">
    <header class="section__head section__head--center reveal">
      <p class="eyebrow">Branches</p>
      <h2 id="br-title" class="h2">Two doors.<br>One <em>standard.</em></h2>
    </header>

    <div class="branches">
      <?php foreach (array_values(cfg('branches')) as $i => $b): ?>
        <article class="branch reveal" style="--d:<?= $i * .1 ?>s" id="branch-<?= e($b['id']) ?>">
          <div class="branch__map">
            <iframe title="Map of RG Fitness <?= e($b['short']) ?>" src="<?= e(map_embed($b)) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
          </div>
          <div class="branch__body">
            <p class="eyebrow"><?= $i === 0 ? 'Branch 01' : 'Branch 02' ?></p>
            <h3><?= e($b['title']) ?></h3>
            <address><?= icon('pin') ?><span><?= implode('<br>', array_map('e', $b['lines'])) ?></span></address>
            <p class="branch__time"><?= icon('clock') ?><span>Open daily <strong><?= e($b['timings']) ?></strong></span></p>
            <div class="branch__cta">
              <a class="btn btn--red" href="<?= e(map_directions($b)) ?>" target="_blank" rel="noopener" data-magnetic>Get Directions <?= icon('arrow-ur') ?></a>
              <a class="btn btn--ghost" href="<?= e(tel_href()) ?>" data-magnetic><?= icon('phone') ?> Call</a>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
