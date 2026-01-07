<?php
// Settings
$sourcePath = 'public/assets/images/logo/garden-flowers-final.png';
$targetPath = 'public/assets/images/logo/garden-flowers-rect.png';
$canvasWidth = 400; // Genişlik
$canvasHeight = 200; // Yükseklik

// Load source
$source = imagecreatefrompng($sourcePath);
if (!$source) {
    die("Error loading image");
}
$sourceWidth = imagesx($source);
$sourceHeight = imagesy($source);

// Create transparent canvas
$canvas = imagecreatetruecolor($canvasWidth, $canvasHeight);
imagealphablending($canvas, false);
imagesavealpha($canvas, true);
$transparent = imagecolorallocatealpha($canvas, 255, 255, 255, 127);
imagefill($canvas, 0, 0, $transparent);

// Calculate aspect ratio to fit
$aspectRatio = $sourceWidth / $sourceHeight;
$targetWidth = $canvasWidth;
$targetHeight = $canvasHeight;

if ($canvasWidth / $canvasHeight > $aspectRatio) {
    // Canvas is wider than image, image constrained by height
    $targetWidth = $canvasHeight * $aspectRatio;
    $targetHeight = $canvasHeight;
} else {
    // Canvas is taller than image, image constrained by width (or same)
    $targetHeight = $canvasWidth / $aspectRatio;
    $targetWidth = $canvasWidth;
}

// Center position
$dstX = ($canvasWidth - $targetWidth) / 2;
$dstY = ($canvasHeight - $targetHeight) / 2;

// Resize and copy
imagecopyresampled(
    $canvas,
    $source,
    (int) $dstX,
    (int) $dstY,
    0,
    0,
    (int) $targetWidth,
    (int) $targetHeight,
    $sourceWidth,
    $sourceHeight
);

// Save
imagepng($canvas, $targetPath);
imagedestroy($canvas);
imagedestroy($source);

echo "Success";
