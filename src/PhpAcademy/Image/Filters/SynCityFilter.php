<?php

namespace PhpAcademy\Image\Filters;

class SynCityFilter implements \Intervention\Image\Filters\FilterInterface
{
    /**
     * Applies filter effects to given image
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(\Intervention\Image\Image $image)
    {
        $image->contrast(10);

        $im = $image->getCore();

        $width = $image->getWidth();
        $height = $image->getHeight();

        for($x=0; $x<$width; $x++){
            for($y=0; $y<$height; $y++){
                $rgb = imagecolorat($im, $x, $y);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;

                $hsv = $this->rgb2hsv($r, $g, $b);
                $h = $hsv[0] * 360;

                if($h > 10 && $h < 340) {
                    $c = 0.3*$r + 0.59*$g + 0.11*$b;
                    $r = $c;
                    $g = $c;
                    $b = $c;
                }

                imagesetpixel($im, $x, $y,imagecolorallocate($im, $r,$g,$b));
            }
        }

        return $image;
    }

    /**
     * Converts colors from RGB to HSV
     *
     * @param int $R
     * @param int $G
     * @param int $B
     * @return int[]
     */
    function rgb2hsv($R, $G, $B)
    {
        // RGB Values:Number 0-255
        // HSV Results:Number 0-1
        $var_R = ($R / 255);
        $var_G = ($G / 255);
        $var_B = ($B / 255);

        $var_Min = min($var_R, $var_G, $var_B);
        $var_Max = max($var_R, $var_G, $var_B);
        $del_Max = $var_Max - $var_Min;

        $V = $var_Max;

        if ($del_Max == 0) {
            $H = 0;
            $S = 0;
        } else {
            $S = $del_Max / $var_Max;

            $del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

            if      ($var_R == $var_Max) $H = $del_B - $del_G;
            else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
            else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;

            if ($H<0) $H++;
            if ($H>1) $H--;
        }

        return [$H, $S, $V];
    }
}
