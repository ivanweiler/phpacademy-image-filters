<?php

namespace PhpAcademy\Image\Filters;

class AntiqueFilter implements \Intervention\Image\Filters\FilterInterface
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
            ->brightness(0)
            ->contrast(30)
            ->colorize(30, 20, 10);

        return $image;
    }
}
