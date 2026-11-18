/* ============================================================================
   RG FITNESS — front-end behaviour (vanilla JS, no dependencies, ~4 KB gz)
   Sections: nav · menu · reveal · counters · magnetic · programs→form ·
             membership branch switch · carousel · FAQ · lead form → WhatsApp
   All motion respects prefers-reduced-motion.
   ========================================================================== */
(function () {
  'use strict';

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  var WA = (window.RG && window.RG.wa) || '916203808227';

  /* ── Navbar: transparent → solid on scroll ─────────────────────────────── */
  var nav = $('#nav');
  function onScroll() { nav.classList.toggle('is-solid', window.scrollY > 40); }
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  /* ── Mobile full-screen menu ───────────────────────────────────────────── */
  var burger = $('#burger'), menu = $('#menu');
  function setMenu(open) {
    if (!burger || !menu) return; // menu is omitted when no nav sections are enabled
    menu.classList.toggle('is-open', open);
    menu.setAttribute('aria-hidden', String(!open));
    burger.setAttribute('aria-expanded', String(open));
    burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    document.body.style.overflow = open ? 'hidden' : '';
    nav.classList.toggle('is-solid', open || window.scrollY > 40);
  }
  if (burger) burger.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); });
  if (menu) $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && menu && menu.classList.contains('is-open')) { setMenu(false); burger.focus(); } });
  window.matchMedia('(min-width: 1100px)').addEventListener('change', function (m) { if (m.matches) setMenu(false); });

  /* ── Scroll reveal (fade + slide up) ───────────────────────────────────── */
  var reveals = $$('.reveal');
  if (!('IntersectionObserver' in window) || reduced) {
    reveals.forEach(function (el) { el.classList.add('is-in'); });
  } else {
    var ro = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        var el = en.target;
        el.classList.add('is-in');
        ro.unobserve(el);
        // Once revealed, drop the helper classes so hover transforms/transitions work normally.
        var delay = parseFloat(getComputedStyle(el).transitionDelay) || 0;
        setTimeout(function () { el.classList.remove('reveal', 'is-in'); }, (delay + 1.1) * 1000);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
    reveals.forEach(function (el) { ro.observe(el); });
  }

  /* ── Animated counters ─────────────────────────────────────────────────── */
  function runCounter(el) {
    var to = parseFloat(el.dataset.count), dec = parseInt(el.dataset.dec, 10) || 0;
    if (reduced) { el.textContent = to.toFixed(dec); return; }
    var dur = 1600, t0 = null;
    function step(t) {
      if (t0 === null) t0 = t;
      var p = Math.min((t - t0) / dur, 1), eased = 1 - Math.pow(1 - p, 4);
      el.textContent = (to * eased).toFixed(dec);
      if (p < 1) requestAnimationFrame(step); else el.textContent = to.toFixed(dec);
    }
    el.textContent = (0).toFixed(dec);
    requestAnimationFrame(step);
  }
  var counters = $$('[data-count]');
  if ('IntersectionObserver' in window) {
    var co = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { runCounter(en.target); co.unobserve(en.target); } });
    }, { threshold: 0.6 });
    counters.forEach(function (c) { co.observe(c); });
  }

  /* ── Magnetic buttons (pointer devices only) ───────────────────────────── */
  if (canHover && !reduced) {
    $$('[data-magnetic]').forEach(function (b) {
      b.addEventListener('pointermove', function (e) {
        var r = b.getBoundingClientRect();
        b.style.setProperty('--mx', ((e.clientX - r.left - r.width / 2) * 0.18).toFixed(1) + 'px');
        b.style.setProperty('--my', ((e.clientY - r.top - r.height / 2) * 0.28).toFixed(1) + 'px');
      });
      b.addEventListener('pointerleave', function () { b.style.setProperty('--mx', '0px'); b.style.setProperty('--my', '0px'); });
    });
  }

  /* ── Program "Learn more" → preselect goal in the trial form ───────────── */
  $$('[data-goal]').forEach(function (a) {
    a.addEventListener('click', function () {
      var sel = $('#f-goal');
      if (sel) sel.value = a.dataset.goal;
    });
  });

  /* ── Membership: branch switch rewrites every WhatsApp link ────────────── */
  var switchBtns = $$('.switch__btn');
  function setBranch(name) {
    switchBtns.forEach(function (b) {
      var on = b.dataset.branch === name;
      b.classList.toggle('is-on', on);
      b.setAttribute('aria-pressed', String(on));
    });
    $$('[data-msg]').forEach(function (a) {
      a.href = 'https://wa.me/' + WA + '?text=' + encodeURIComponent(a.dataset.msg.replace('{branch}', name));
    });
    var fb = $('#f-branch');
    if (fb) fb.value = name;
  }
  switchBtns.forEach(function (b) { b.addEventListener('click', function () { setBranch(b.dataset.branch); }); });

  /* ── Testimonials carousel ─────────────────────────────────────────────── */
  var car = $('#carousel'), prev = $('#prev'), next = $('#next');
  if (car) {
    var stepBy = function () { var q = $('.quote', car); return q ? q.getBoundingClientRect().width + 24 : 320; };
    var sync = function () {
      prev.disabled = car.scrollLeft < 8;
      next.disabled = car.scrollLeft + car.clientWidth >= car.scrollWidth - 8;
    };
    prev.addEventListener('click', function () { car.scrollBy({ left: -stepBy(), behavior: reduced ? 'auto' : 'smooth' }); });
    next.addEventListener('click', function () { car.scrollBy({ left: stepBy(), behavior: reduced ? 'auto' : 'smooth' }); });
    car.addEventListener('scroll', sync, { passive: true });
    car.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowRight') { e.preventDefault(); next.click(); }
      if (e.key === 'ArrowLeft') { e.preventDefault(); prev.click(); }
    });
    window.addEventListener('resize', sync);
    sync();
  }

  /* ── FAQ accordion (one open at a time) ────────────────────────────────── */
  $$('.qa__q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.qa'), open = !item.classList.contains('is-open');
      $$('.qa.is-open').forEach(function (o) {
        o.classList.remove('is-open');
        $('.qa__q', o).setAttribute('aria-expanded', 'false');
      });
      if (open) { item.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true'); }
    });
  });

  /* ── Free-trial form → WhatsApp (no backend) ───────────────────────────── */
  var form = $('#trialForm'), ok = $('#trialOk');
  if (form) {
    var err = function (input, msg) {
      var f = input.closest('.field');
      f.classList.toggle('is-bad', !!msg);
      $('.err', f).textContent = msg || '';
      input.setAttribute('aria-invalid', msg ? 'true' : 'false');
    };
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var name = form.elements.name, phone = form.elements.phone, bad = null;
      var digits = phone.value.replace(/\D/g, '').replace(/^(91|0)(?=\d{10}$)/, '');
      err(name, ''); err(phone, '');
      if (name.value.trim().length < 2) { err(name, 'Please enter your name.'); bad = bad || name; }
      if (!/^[6-9]\d{9}$/.test(digits)) { err(phone, 'Enter a valid 10-digit mobile number.'); bad = bad || phone; }
      if (bad) { bad.focus(); return; }

      var msg = [
        "Hi RG Fitness, I'd like to book a free trial.",
        '',
        'Name: ' + name.value.trim(),
        'Phone: ' + digits,
        'Branch: ' + form.elements.branch.value,
        'Goal: ' + form.elements.goal.value,
        'Preferred time: ' + form.elements.time.value
      ].join('\n');
      var url = 'https://wa.me/' + WA + '?text=' + encodeURIComponent(msg);

      $('#trialRetry').href = url;
      form.hidden = true;
      ok.hidden = false;
      ok.focus();
      window.open(url, '_blank', 'noopener');
    });
    $('#trialReset').addEventListener('click', function () {
      form.reset(); form.hidden = false; ok.hidden = true; $('#f-name').focus();
    });
  }
})();
