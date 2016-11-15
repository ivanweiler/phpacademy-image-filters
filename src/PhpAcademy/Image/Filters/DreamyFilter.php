<?php

namespace PhpAcademy\Image\Filters;

class DreamyFilter implements \Intervention\Image\Filters\FilterInterface
{
    use OverlayTrait;

    /**
     * Applies filter effects to given image
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(\Intervention\Image\Image $image)
    {
        $image
            ->brightness(9)
            ->contrast(35)
            ->colorize(23, -4, 14)
            ;

        imagefilter($image->getCore(), IMG_FILTER_SMOOTH, 7);

        $this->overlay($image->getCore(), 'scratch', 10);

        return $image;
    }
}
