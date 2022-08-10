<?php

namespace domain\Facades;

use domain\Services\Settings\SettingService;
use Illuminate\Support\Facades\Facade;

/**
 * Class DrugFacade
 * @package domain\Facades
 */
class SettingFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SettingService::class;
    }

}
