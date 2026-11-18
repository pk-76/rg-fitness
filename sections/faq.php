<?php /** FAQ accordion (button + aria-expanded; animated via CSS grid rows). Answers in config.php. */ ?>
<section class="section section--surface grain" id="faq" aria-labelledby="faq-title">
  <div class="container faq">
    <header class="section__head reveal">
      <p class="eyebrow">FAQ</p>
      <h2 id="faq-title" class="h2">Quick<br><em>answers.</em></h2>
      <p class="lead">Still unsure? <a class="inline" href="<?= e(wa_href('Hi RG Fitness, I have a question.')) ?>" target="_blank" rel="noopener">Ask us on WhatsApp</a>.</p>
    </header>

    <div class="faq__list">
      <?php foreach (cfg('faq') as $i => $f): ?>
        <div class="qa reveal" style="--d:<?= $i * .04 ?>s">
          <h3>
            <button type="button" class="qa__q" id="qa-q<?= $i ?>" aria-expanded="false" aria-controls="qa-a<?= $i ?>">
              <span><?= e($f['q']) ?></span><?= icon('plus') ?>
            </button>
          </h3>
          <div class="qa__a" id="qa-a<?= $i ?>" role="region" aria-labelledby="qa-q<?= $i ?>"><div><p><?= e($f['a']) ?></p></div></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
