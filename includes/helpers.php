<?php
/**
 * Shared helpers: config access, escaping, links, images, icons.
 */

/** Folder (relative to site root) that holds the real RG Fitness photos. */
const IMG_DIR = 'assets/rg_gym/';

/** Load config once. cfg() = whole array, cfg('name') = one key. */
function cfg(?string $key = null)
{
    static $c = null;
    if ($c === null) {
        $c = require __DIR__ . '/../config.php';
    }
    return $key === null ? $c : ($c[$key] ?? null);
}

/** Is this section enabled in config.php → 'sections'? */
function section_on(string $name): bool
{
    return in_array($name, cfg('sections'), true);
}

/** HTML-escape. */
function e($s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** tel: link. */
function tel_href(): string
{
    return 'tel:' . cfg('phone_tel');
}

/** wa.me link with optional pre-filled message. */
function wa_href(string $msg = ''): string
{
    return 'https://wa.me/' . cfg('whatsapp') . ($msg !== '' ? '?text=' . rawurlencode($msg) : '');
}

/** Google Maps directions + embed URLs. */
function map_directions(array $b): string
{
    return 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode($b['map_q']);
}
function map_embed(array $b): string
{
    return 'https://www.google.com/maps?q=' . rawurlencode($b['map_q']) . '&output=embed';
}

/**
 * Resolve an image key to a URL.
 * 1) /assets/img/gym/<file>.webp  2) /assets/img/gym/<file>  3) Unsplash placeholder.
 */
function img_url(string $key, int $w = 900): string
{
    $im = cfg('images')[$key] ?? null;
    if (!$im) {
        return '';
    }
    $base = pathinfo($im['file'], PATHINFO_FILENAME);
    if (is_file(__DIR__ . '/../' . IMG_DIR . $base . '.webp')) {
        return IMG_DIR . rawurlencode($base) . '.webp';
    }
    if (is_file(__DIR__ . '/../' . IMG_DIR . $im['file'])) {
        return IMG_DIR . rawurlencode($im['file']);
    }
    // PLACEHOLDER: Unsplash, served as WebP. Replace by adding the real file above.
    return 'https://images.unsplash.com/photo-' . $im['u'] . '?auto=format&fm=webp&fit=crop&q=70&w=' . $w;
}

/** True when the real local file exists (used to skip upscaling tricks). */
function img_is_local(string $key): bool
{
    return strpos(img_url($key), IMG_DIR) === 0;
}

/** Absolute URL for OG tags. */
function img_abs(string $key, int $w = 1200): string
{
    $u = img_url($key, $w);
    return preg_match('#^https?://#', $u) ? $u : rtrim(cfg('site_url'), '/') . '/' . $u;
}

/** Complete <img> tag: lazy, async-decoded, intrinsic size to prevent layout shift. */
function img_tag(string $key, int $w = 900, string $class = '', bool $eager = false, ?string $alt = null, string $sizes = '100vw'): string
{
    $im  = cfg('images')[$key];
    $alt = $alt ?? $im['alt'];
    $src = img_url($key, $w);
    $srcset = '';
    if (!img_is_local($key)) { // Unsplash supports width variants
        $srcset = ' srcset="' . e(img_url($key, (int) ($w / 2))) . ' ' . (int) ($w / 2) . 'w, ' . e($src) . ' ' . $w . 'w" sizes="' . e($sizes) . '"';
    }
    return sprintf(
        '<img src="%s"%s alt="%s" width="%d" height="%d" class="%s" %s decoding="async"%s>',
        e($src), $srcset, e($alt), $im['w'], $im['h'], e($class),
        $eager ? 'fetchpriority="high"' : 'loading="lazy"',
        ''
    );
}

/** Rupee formatting: 10000 -> ₹10,000 */
function inr(int $n): string
{
    return '₹' . number_format($n);
}

/**
 * Inline SVG icons (24px grid). Stroke icons inherit currentColor.
 */
function icon(string $name, string $class = 'ico'): string
{
    static $i = [
        'arrow'    => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'arrow-ur' => '<path d="M7 17 17 7M8 7h9v9"/>',
        'phone'    => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>',
        'pin'      => '<path d="M12 21s7-5.8 7-11a7 7 0 1 0-14 0c0 5.2 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/>',
        'clock'    => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'check'    => '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
        'plus'     => '<path d="M12 5v14M5 12h14"/>',
        'menu'     => '<path d="M4 8h16M4 16h16"/>',
        'close'    => '<path d="M6 6l12 12M18 6 6 18"/>',
        'chev-l'   => '<path d="m15 5-7 7 7 7"/>',
        'chev-r'   => '<path d="m9 5 7 7-7 7"/>',
        'wifi'     => '<path d="M2.5 9a15 15 0 0 1 19 0M5.5 12.5a10.5 10.5 0 0 1 13 0M8.7 16a6 6 0 0 1 6.6 0"/><circle cx="12" cy="19.2" r=".8" fill="currentColor"/>',
        'snow'     => '<path d="M12 2v20M4 7l16 10M20 7 4 17M9 4l3 2 3-2M9 20l3-2 3 2"/>',
        'sauna'    => '<path d="M8 3c-1.5 2 1.5 3 0 5M12 3c-1.5 2 1.5 3 0 5M16 3c-1.5 2 1.5 3 0 5"/><path d="M3 21h18M5 21v-6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v6"/>',
        'dumbbell' => '<path d="M6.5 6.5v11M17.5 6.5v11M3.5 9v6M20.5 9v6M6.5 12h11"/>',
        'pulse'    => '<path d="M3 12h4l2.5-6 4 12 2.5-6H21"/>',
        'access'   => '<circle cx="12" cy="4.5" r="1.8"/><path d="M12 8v6h5l2 6M12 11h5M9.5 12.5a5 5 0 1 0 6 6"/>',
        'instagram'=> '<rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r=".9" fill="currentColor"/>',
    ];
    if ($name === 'whatsapp') {
        return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.16-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.39-1.48-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.21 3.07.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.63.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.17-1.41-.07-.12-.27-.2-.57-.35m-5.42 7.4h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 6.99c0 5.45-4.44 9.88-9.88 9.88m8.41-18.3A11.82 11.82 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.89c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.68 1.45h.01c6.55 0 11.89-5.34 11.89-11.89 0-3.18-1.24-6.17-3.48-8.41Z"/></svg>';
    }
    if ($name === 'star') {
        return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="m12 2.8 2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.7 6.1 20.8l1.2-6.5L2.5 9.7l6.6-.9z"/></svg>';
    }
    $d = $i[$name] ?? '';
    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $d . '</svg>';
}
