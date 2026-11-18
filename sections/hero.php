<?php
/**
 * HERO — full-screen background with slow Ken Burns zoom.
 * >>> SWAP: set 'hero_image' in config.php (and drop the photo in /assets/img/gym/),
 *     or set 'hero_video' for a muted looping background video.
 */
$video = cfg('hero_video');
$b = cfg('branches');
?>
<section class="hero grain" aria-labelledby="hero-title">
  <div class="hero__media" aria-hidden="true">
    <?php if ($video && is_file(__DIR__ . '/../' . $video)): ?>
      <video class="hero__img" autoplay muted loop playsinline preload="metadata" poster="<?= e(img_url(cfg('hero_image'), 1600)) ?>">
        <source src="<?= e($video) ?>" type="video/mp4">
      </video>
    <?php else: ?>
      <?= img_tag(cfg('hero_image'), 1600, 'hero__img', true, '') ?>
    <?php endif; ?>
  </div>
  <div class="hero__shade" aria-hidden="true"></div>

  <div class="container hero__in">
    <?php $badgeTag = section_on('testimonials') ? 'a href="#testimonials"' : 'div'; $badgeEnd = section_on('testimonials') ? 'a' : 'div'; ?>
    <<?= $badgeTag ?> class="badge anim-up" style="--d:.1s">
      <?= icon('star') ?> <?= e(cfg('rating')) ?> <i>·</i> <?= e(cfg('rating_count')) ?> Google reviews
    </<?= $badgeEnd ?>>

    <h1 id="hero-title" class="hero__title">
      <span class="line"><span class="anim-line" style="--d:.2s">Built in Jamshedpur.</span></span>
      <span class="line"><span class="anim-line" style="--d:.34s">Trained to <em>world standard.</em></span></span>
    </h1>

    <p class="hero__sub anim-up" style="--d:.6s">Two premium branches. Expert trainers. 6 AM – 10:30 PM.</p>

    <div class="hero__cta anim-up" style="--d:.75s">
      <a class="btn btn--red btn--lg" href="#trial" data-magnetic>Book a Free Trial <?= icon('arrow') ?></a>
      <a class="btn btn--ghost btn--lg" href="#membership" data-magnetic>View Membership</a>
    </div>
  </div>

  <div class="container hero__foot anim-up" style="--d:.95s">
    <ul class="hero__branches">
      <?php foreach ($b as $br): ?>
        <li><strong><?= e($br['short']) ?></strong><span><?= e($br['timings']) ?></span></li>
      <?php endforeach; ?>
    </ul>
    <a class="hero__scroll" href="#programs" aria-label="Scroll to programs"><span></span>Scroll</a>
  </div>
</section>
