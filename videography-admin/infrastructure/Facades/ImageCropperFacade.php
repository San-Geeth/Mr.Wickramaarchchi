<?php

namespace infrastructure\Facades;

use Illuminate\Support\Facades\Facade;
use infrastructure\ImageCropper;

/**
 * Class ImageCropperFacade
 * @package infrastructure\Facades
 */
class ImageCropperFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ImageCropper::class;
    }
}
