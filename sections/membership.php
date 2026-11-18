<?php
/**
 * MEMBERSHIP — 4 plans, 12-month highlighted. [CONFIRM all prices in config.php]
 * "Join Now" opens WhatsApp: "Hi RG Fitness, I want to join the [plan] plan at the [branch] branch."
 * The branch switch updates every link via JS; the default (first branch) is rendered server-side.
 */
$branches = cfg('branches');
$first    = reset($branches);
$one      = cfg('plans')[0]['price'];
$msg = fn(string $plan, string $branch) => "Hi RG Fitness, I want to join the {$plan} plan at the {$branch} branch.";
?>
<section class="section" id="membership" aria-labelledby="mem-title">
  <div class="container">
    <header class="section__head section__head--center reveal">
      <p class="eyebrow">Membership</p>
      <h2 id="mem-title" class="h2">Simple plans.<br><em>Serious</em> value.</h2>
      <p class="lead">No joining games. Pick a plan, pick a branch and start training.</p>
    </header>

    <div class="switch reveal" role="group" aria-label="Choose your branch">
      <?php foreach ($branches as $b): ?>
        <button type="button" class="switch__btn<?= $b['id'] === $first['id'] ? ' is-on' : '' ?>" data-branch="<?= e($b['short']) ?>" aria-pressed="<?= $b['id'] === $first['id'] ? 'true' : 'false' ?>"><?= e($b['short']) ?> branch</button>
      <?php endforeach; ?>
    </div>

    <div class="plans">
      <?php foreach (cfg('plans') as $i => $p):
        $perMonth = (int) round($p['price'] / $p['months']);
        $save     = $p['months'] > 1 ? (int) round((1 - $perMonth / $one) * 100) : 0;
      ?>
        <article class="plan reveal<?= $p['featured'] ? ' plan--best' : '' ?>" style="--d:<?= $i * .08 ?>s">
          <?php if ($p['featured']): ?><span class="plan__flag">Best Value</span><?php endif; ?>
          <h3><?= e($p['name']) ?></h3>
          <p class="plan__price"><?= e(inr($p['price'])) ?></p>
          <p class="plan__per">
            <?= $p['months'] > 1 ? e(inr($perMonth)) . ' / month' : 'Billed monthly' ?>
            <?php if ($save): ?><b>Save <?= $save ?>%</b><?php endif; ?>
          </p>
          <ul>
            <?php foreach (cfg('plan_features') as $f): ?>
              <li><?= icon('check') ?><?= e($f) ?></li>
            <?php endforeach; ?>
          </ul>
          <a class="btn <?= $p['featured'] ? 'btn--red' : 'btn--ghost' ?> btn--block" data-magnetic
             data-msg="<?= e($msg($p['name'], '{branch}')) ?>"
             href="<?= e(wa_href($msg($p['name'], $first['short']))) ?>" target="_blank" rel="noopener">
            Join Now <?= icon('arrow') ?>
          </a>
        </article>
      <?php endforeach; ?>
    </div>

    <?php foreach (cfg('addons') as $a):
      $m = $a['price'] === null
        ? "Hi RG Fitness, I'd like details on {$a['name']} at the {branch} branch."
        : "Hi RG Fitness, I want to add {$a['name']} at the {branch} branch.";
    ?>
    <div class="addon reveal">
      <div>
        <p class="eyebrow">Add-on</p>
        <h3><?= e($a['name']) ?></h3>
        <p><?= e($a['blurb']) ?></p>
      </div>
      <p class="addon__price">
        <?php if ($a['price'] === null): ?>Ask for rates<?php else: ?><?= e(inr($a['price'])) ?><small>/ <?= e($a['per']) ?></small><?php endif; ?>
      </p>
      <a class="btn btn--ghost" data-magnetic data-msg="<?= e($m) ?>"
         href="<?= e(wa_href(str_replace('{branch}', $first['short'], $m))) ?>" target="_blank" rel="noopener"><?= e($a['cta']) ?> <?= icon('arrow') ?></a>
    </div>
    <?php endforeach; ?>
    <p class="fine reveal">Prices shown are indicative. Confirm current rates with the front desk.</p>
  </div>
</section>
