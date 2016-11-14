<?php

namespace PhpAcademy\Image\Filters;

class SepiaFilter implements \Intervention\Image\Filters\FilterInterface
{
    /**
     * Applies filter effects to given image
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(\Intervention\Image\Image $image)
    {
        $image
            ->greyscale()
            ->brightness(-4)
            ->contrast(20)
            ->colorize(24, 12, -6);

        return $image;
    }
}
