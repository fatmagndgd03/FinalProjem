
Add-Type -AssemblyName System.Drawing

$sourcePath = "$PSScriptRoot\public\assets\images\logo\garden-flowers-ps.png"
$targetPath = "$PSScriptRoot\public\assets\images\logo\garden-flowers-pink.png"
$targetColor = [System.Drawing.Color]::FromArgb(255, 107, 129) # #FF6B81

$bitmap = [System.Drawing.Bitmap]::FromFile($sourcePath)
$newBitmap = New-Object System.Drawing.Bitmap($bitmap.Width, $bitmap.Height)

for ($x = 0; $x -lt $bitmap.Width; $x++) {
    for ($y = 0; $y -lt $bitmap.Height; $y++) {
        $pixelColor = $bitmap.GetPixel($x, $y)
        
        # Check if pixel is not transparent
        if ($pixelColor.A -gt 0) {
            # Check if pixel is white (or very light)
            if ($pixelColor.R -gt 200 -and $pixelColor.G -gt 200 -and $pixelColor.B -gt 200) {
                # Preserve alpha, change color to pink
                $newColor = [System.Drawing.Color]::FromArgb($pixelColor.A, $targetColor.R, $targetColor.G, $targetColor.B)
                $newBitmap.SetPixel($x, $y, $newColor)
            } else {
                # Keep original pixel (e.g. shadows or other colors if any)
                $newBitmap.SetPixel($x, $y, $pixelColor)
            }
        } else {
             $newBitmap.SetPixel($x, $y, $pixelColor)
        }
    }
}

$newBitmap.Save($targetPath, [System.Drawing.Imaging.ImageFormat]::Png)

$bitmap.Dispose()
$newBitmap.Dispose()

Write-Host "Success"
