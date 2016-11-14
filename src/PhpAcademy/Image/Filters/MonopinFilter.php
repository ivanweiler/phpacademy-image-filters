<?php

namespace PhpAcademy\Image\Filters;

class MonopinFilter implements \Intervention\Image\Filters\FilterInterface
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
            ->brightness(-6)
            ->contrast(15);

        return $image;
    }
}
