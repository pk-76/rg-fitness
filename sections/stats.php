<?php /** Stats band: animated counters (JS reads data-count / data-dec). */ ?>
<section class="stats" aria-label="RG Fitness in numbers">
  <div class="container stats__grid">
    <?php foreach (cfg('stats') as $i => $s): ?>
      <div class="stat reveal" style="--d:<?= $i * .08 ?>s">
        <div class="stat__num">
          <span data-count="<?= e($s['value']) ?>" data-dec="<?= (int) $s['dec'] ?>"><?= number_format($s['value'], $s['dec']) ?></span><em><?= e($s['suffix']) ?></em>
        </div>
        <p><?= e($s['label']) ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>
