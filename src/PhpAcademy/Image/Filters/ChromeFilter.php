<?php

namespace PhpAcademy\Image\Filters;

class ChromeFilter implements \Intervention\Image\Filters\FilterInterface
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
            ->brightness(6)
            ->contrast(15)
            ->colorize(-2, -4, -6);

        $this->overlay($image->getCore(), 'noise', 45);

        return $image;
    }

}
