<?php

namespace PhpAcademy\Image\Filters;

class BlurFilter implements \Intervention\Image\Filters\FilterInterface
{
    /**
     * Applies filter effects to given image
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(\Intervention\Image\Image $image)
    {
        imagefilter($image->getCore(), IMG_FILTER_SELECTIVE_BLUR);
        imagefilter($image->getCore(), IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image->getCore(), IMG_FILTER_CONTRAST, -15);
        imagefilter($image->getCore(), IMG_FILTER_SMOOTH, -2);

        return $image;
    }
}
