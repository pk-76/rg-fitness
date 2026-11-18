<?php
/**
 * TRANSFORMATIONS / TESTIMONIALS — swipeable scroll-snap carousel.
 * >>> ALL CONTENT HERE IS SAMPLE. Replace names, quotes and before/after photos with real,
 *     consented member content in config.php → 'testimonials'. Each card shows a SAMPLE tag until you do.
 */ ?>
<section class="section" id="testimonials" aria-labelledby="te-title">
  <div class="container">
    <header class="section__head section__head--split reveal">
      <div>
        <p class="eyebrow">Transformations</p>
        <h2 id="te-title" class="h2">Real people.<br>Real <em>results.</em></h2>
      </div>
      <div class="carousel__ctl" aria-label="Carousel controls">
        <button type="button" class="round" id="prev" aria-label="Previous review"><?= icon('chev-l') ?></button>
        <button type="button" class="round" id="next" aria-label="Next review"><?= icon('chev-r') ?></button>
      </div>
    </header>
  </div>

  <div class="carousel" id="carousel" tabindex="0" role="region" aria-label="Member transformations, swipe or use arrow keys">
    <?php foreach (cfg('testimonials') as $i => $t): ?>
      <figure class="quote">
        <?php if (!empty($t['combo'])): ?>
          <!-- Real photo: one image with BEFORE / AFTER labels already on it -->
          <div class="ba ba--combo"><?= img_tag($t['combo'], 700, 'ba__img', false, null, '(min-width:640px) 420px, 86vw') ?></div>
          <span class="quote__sample quote__sample--real">Real transformation · add member's name &amp; quote</span>
        <?php else: ?>
          <div class="ba">
            <div class="ba__half"><?= img_tag($t['before'], 500, 'ba__img ba__img--before', false, 'Placeholder: before photo') ?><span>Before</span></div>
            <div class="ba__half"><?= img_tag($t['after'], 500, 'ba__img', false, 'Placeholder: after photo') ?><span>After</span></div>
          </div>
          <span class="quote__sample">Sample · replace with real review</span>
        <?php endif; ?>
        <div class="quote__stars" role="img" aria-label="<?= (int) $t['stars'] ?> out of 5 stars"><?php for ($s = 0; $s < $t['stars']; $s++) echo icon('star'); ?></div>
        <blockquote>“<?= e($t['quote']) ?>”</blockquote>
        <figcaption><strong><?= e($t['name']) ?></strong><span><?= e($t['detail']) ?></span></figcaption>
      </figure>
    <?php endforeach; ?>
  </div>
</section>
