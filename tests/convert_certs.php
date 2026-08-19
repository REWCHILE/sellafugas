<?php
$files = glob(__DIR__ . '/../public/images/certificates/*.jpg');
foreach ($files as $f) {
    $img = @imagecreatefromjpeg($f);
    if ($img) {
        $webp = preg_replace('/\.jpg$/', '.webp', $f);
        imagewebp($img, $webp, 92);
        imagedestroy($img);
        echo "Created: " . basename($webp) . "\n";
    }
}
