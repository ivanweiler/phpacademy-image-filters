<?php

namespace PhpAcademy\Image\Filters;

class RetroFilter implements \Intervention\Image\Filters\FilterInterface
{
    /**
     * Default size of filter effects
     */
    const DEFAULT_SIZE = 4;

    /**
     * Size of filter effects
     *
     * @var integer
     */
    private $size;

    /**
     * Creates new instance of filter
     *
     * @param integer $size
     */
    public function __construct($size = null)
    {
        $this->size = is_numeric($size) ? intval($size) : self::DEFAULT_SIZE;
    }

    /**
     * Applies filter effects to given image
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(\Intervention\Image\Image $image)
    {
        $image
            ->contrast(15)
            ->pixelate($this->size);

        return $image;
    }
}
