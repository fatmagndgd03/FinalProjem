
Add-Type -AssemblyName System.Drawing

$sourcePath = "$PSScriptRoot\public\assets\images\logo\garden-flowers-final.png"
$targetPath = "$PSScriptRoot\public\assets\images\logo\garden-flowers-ps.png"
$canvasWidth = 400
$canvasHeight = 200

$source = [System.Drawing.Image]::FromFile($sourcePath)

$canvas = New-Object System.Drawing.Bitmap($canvasWidth, $canvasHeight)
$graphics = [System.Drawing.Graphics]::FromImage($canvas)
$graphics.Clear([System.Drawing.Color]::Transparent)
$graphics.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic

# Aspect Ratio Calc
$ratio = $source.Width / $source.Height
$targetW = $canvasWidth
$targetH = $canvasHeight

if ($canvasWidth / $canvasHeight > $ratio) {
    $targetW = $canvasHeight * $ratio
    $targetH = $canvasHeight
} else {
    $targetH = $canvasWidth / $ratio
    $targetW = $canvasWidth
}

$x = ($canvasWidth - $targetW) / 2
$y = ($canvasHeight - $targetH) / 2

$graphics.DrawImage($source, $x, $y, $targetW, $targetH)

$canvas.Save($targetPath, [System.Drawing.Imaging.ImageFormat]::Png)

$source.Dispose()
$canvas.Dispose()
$graphics.Dispose()

Write-Host "Success"
