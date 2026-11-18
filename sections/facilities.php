<?php
/**
 * FACILITIES — editorial bento grid.
 * >>> Sauna / WiFi / Accessibility are icon tiles (no photo needed).
 *     Add a real sauna photo as 'sauna' in config.php images if you want one.
 */ ?>
<section class="section section--surface grain" id="facilities" aria-labelledby="fac-title">
  <div class="container">
    <header class="section__head section__head--split reveal">
      <div>
        <p class="eyebrow">Facilities</p>
        <h2 id="fac-title" class="h2">Everything you need.<br><em>Nothing you don't.</em></h2>
      </div>
      <p class="lead">Premium kit, clean floors and a recovery zone, across two air-conditioned branches.</p>
    </header>

    <div class="bento">
      <article class="tile tile--img tile--a reveal">
        <?= img_tag('floor', 1000, 'tile__img', false, null, '(min-width:1024px) 50vw, 100vw') ?>
        <div class="tile__shade"></div>
        <div class="tile__txt"><?= icon('snow') ?><h3>Air-conditioned training floor</h3><p>Train hard in comfort, any time of year.</p></div>
      </article>

      <article class="tile tile--img tile--b reveal" style="--d:.08s">
        <?= img_tag('dumbbells', 700, 'tile__img', false, null, '(min-width:1024px) 25vw, 100vw') ?>
        <div class="tile__shade"></div>
        <div class="tile__txt"><?= icon('dumbbell') ?><h3>Free weights zone</h3><p>Full dumbbell racks and platforms.</p></div>
      </article>

      <article class="tile tile--img tile--c reveal" style="--d:.16s">
        <?= img_tag('cardio', 700, 'tile__img', false, null, '(min-width:1024px) 25vw, 100vw') ?>
        <div class="tile__shade"></div>
        <div class="tile__txt"><?= icon('pulse') ?><h3>Cardio zone</h3><p>Bikes, treadmills and cross-trainers.</p></div>
      </article>

      <article class="tile tile--feature tile--d reveal">
        <span class="tile__tag">Recovery</span>
        <?= icon('sauna', 'ico ico--xl') ?>
        <h3>Sauna &amp; steam</h3>
        <p>Finish every session the right way. Heat, sweat and reset.</p>
      </article>

      <article class="tile tile--sm tile--e reveal" style="--d:.08s">
        <?= icon('wifi', 'ico ico--lg') ?>
        <h3>Free WiFi</h3>
        <p>Stay connected between sets.</p>
      </article>

      <article class="tile tile--sm tile--f reveal" style="--d:.16s">
        <?= icon('access', 'ico ico--lg') ?>
        <h3>Accessible</h3>
        <p>Wheelchair-accessible entrance.</p>
      </article>

      <!-- [CONFIRM] lockers, showers and steam are reported on third-party listings -->
      <article class="tile tile--img tile--g reveal" style="--d:.24s">
        <?= img_tag('lockers', 800, 'tile__img tile__img--top', false, null, '(min-width:1024px) 50vw, 100vw') ?>
        <div class="tile__shade"></div>
        <div class="tile__txt"><?= icon('check') ?><h3>Lockers &amp; fresh-up zone</h3><p>Secure lockers, showers and steam. Arrive sharp, leave refreshed.</p></div>
      </article>
    </div>
  </div>
</section>
