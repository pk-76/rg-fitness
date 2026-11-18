<?php
/**
 * Static export for GitHub Pages (which can't run PHP).
 *
 *   php build.php          →  writes the finished site into /docs
 *
 * Re-run after every change to config.php / sections / assets, then commit and push.
 * The page is marked noindex so a client preview doesn't get indexed by Google.
 * Remove the noindex line below for the real launch.
 */
if (PHP_SAPI !== 'cli') { exit("Run from the command line: php build.php\n"); }

chdir(__DIR__);
$out = __DIR__ . '/docs';

// 1. Render index.php to HTML
ob_start();
require __DIR__ . '/index.php';
$html = ob_get_clean();
$html = str_replace('<meta charset="utf-8">', '<meta charset="utf-8">' . "\n" . '<meta name="robots" content="noindex, nofollow">', $html);

// 2. Fresh docs/ folder
function rrmdir(string $d): void {
    if (!is_dir($d)) return;
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $f) {
        $f->isDir() ? rmdir($f->getPathname()) : unlink($f->getPathname());
    }
    rmdir($d);
}
rrmdir($out);
mkdir($out, 0777, true);

file_put_contents($out . '/index.html', $html);
file_put_contents($out . '/.nojekyll', '');   // serve files as-is

// 3. Copy static assets
function rcopy(string $src, string $dst): void {
    mkdir($dst, 0777, true);
    foreach (new DirectoryIterator($src) as $f) {
        if ($f->isDot()) continue;
        $t = $dst . '/' . $f->getFilename();
        $f->isDir() ? rcopy($f->getPathname(), $t) : copy($f->getPathname(), $t);
    }
}
rcopy(__DIR__ . '/assets', $out . '/assets');

echo "Built docs/index.html (" . round(strlen($html) / 1024) . " KB)\n";
