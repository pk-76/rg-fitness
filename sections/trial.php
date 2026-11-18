<?php
/**
 * FREE TRIAL / LEAD FORM — no backend. JS builds a WhatsApp message and opens
 * wa.me/<number>?text=… then shows a success state (see assets/js/main.js).
 */ ?>
<section class="section trial grain" id="trial" aria-labelledby="trial-title">
  <div class="container trial__grid">
    <div class="trial__copy reveal">
      <p class="eyebrow">Free trial</p>
      <h2 id="trial-title" class="h2">Your first session<br>is on <em>us.</em></h2>
      <p class="lead">Tell us your goal. We'll confirm your slot on WhatsApp, usually within minutes.</p>
      <ul class="trial__facts">
        <li><?= icon('check') ?>No joining pressure</li>
        <li><?= icon('check') ?>Meet your trainer</li>
        <li><?= icon('check') ?>Tour both floors and the sauna</li>
      </ul>
      <a class="trial__phone" href="<?= e(tel_href()) ?>"><?= icon('phone') ?> <?= e(cfg('phone_display')) ?></a>
    </div>

    <div class="formcard reveal" style="--d:.1s">
      <form id="trialForm" novalidate>
        <div class="field">
          <label for="f-name">Full name</label>
          <input id="f-name" name="name" type="text" autocomplete="name" placeholder="Your name" required>
          <small class="err" aria-live="polite"></small>
        </div>
        <div class="field">
          <label for="f-phone">Phone number</label>
          <input id="f-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="98765 43210" required>
          <small class="err" aria-live="polite"></small>
        </div>
        <div class="field-row">
          <div class="field">
            <label for="f-branch">Branch</label>
            <select id="f-branch" name="branch" required>
              <?php foreach (cfg('branches') as $b): ?><option value="<?= e($b['short']) ?>"><?= e($b['short']) ?></option><?php endforeach; ?>
            </select>
          </div>
          <div class="field">
            <label for="f-goal">Goal</label>
            <select id="f-goal" name="goal" required>
              <?php foreach (cfg('goals') as $g): ?><option><?= e($g) ?></option><?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="field">
          <label for="f-time">Preferred time</label>
          <select id="f-time" name="time" required>
            <?php foreach (cfg('times') as $t): ?><option><?= e($t) ?></option><?php endforeach; ?>
          </select>
        </div>
        <button class="btn btn--red btn--lg btn--block" type="submit">Book My Free Trial <?= icon('whatsapp') ?></button>
        <p class="fine">Opens WhatsApp with your details pre-filled. We never share your number.</p>
      </form>

      <div class="success" id="trialOk" hidden tabindex="-1">
        <span class="success__ico"><?= icon('check') ?></span>
        <h3>You're in.</h3>
        <p>WhatsApp should now be open with your details. Just hit send and we'll confirm your slot.</p>
        <a class="btn btn--ghost" id="trialRetry" href="#" target="_blank" rel="noopener">WhatsApp didn't open? Tap here</a>
        <button type="button" class="link" id="trialReset">Submit another request</button>
      </div>
    </div>
  </div>
</section>
