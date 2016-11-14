<?php

namespace PhpAcademy\Image\Filters;

class BlackWhiteFilter implements \Intervention\Image\Filters\FilterInterface
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
            ->brightness(4)
            ->contrast(20);

        return $image;
    }
}
