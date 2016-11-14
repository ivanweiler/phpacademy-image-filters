<?php

namespace PhpAcademy\Image\Filters;

class BoostFilter implements \Intervention\Image\Filters\FilterInterface
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
            ->contrast(35)
            ->colorize(10, 10, 10);

        return $image;
    }
}
