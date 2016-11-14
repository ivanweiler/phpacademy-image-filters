<?php

namespace PhpAcademy\Image\Filters;

class VelvetFilter implements \Intervention\Image\Filters\FilterInterface
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
            ->brightness(2)
            ->contrast(25)
            ->colorize(-4, 18, 25);

        $this->overlay($image->getCore(), 'noise', 45);

        return $image;
    }

}
