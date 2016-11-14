<?php

namespace PhpAcademy\Image\Filters;

trait OverlayTrait
{
    protected function overlay($im, $type, $amount)
    {
        $width = imagesx($im);
        $height = imagesy($im);
        $filter = imagecreatetruecolor($width, $height);

        imagealphablending($filter, false);
        imagesavealpha($filter, true);

        $transparent = imagecolorallocatealpha($filter, 255, 255, 255, 127);
        imagefilledrectangle($filter, 0, 0, $width, $height, $transparent);

        $overlay = __DIR__ . '/../../../../overlay/' . basename($type) . '.png';
        $png = imagecreatefrompng($overlay);
        imagecopyresampled($filter, $png, 0, 0, 0, 0, $width, $height, $width, $height);

        $comp = imagecreatetruecolor($width, $height);
        imagecopy($comp, $im, 0, 0, 0, 0, $width, $height);
        imagecopy($comp, $filter, 0, 0, 0, 0, $width, $height);
        imagecopymerge($im, $comp, 0, 0, 0, 0, $width, $height, $amount);

        imagedestroy($comp);
        return $im;
    }

}