<?php

namespace domain\Facades;

use domain\Services\VisitorRequestsService\VisitorRequestsService;
use Illuminate\Support\Facades\Facade;

class VisitorRequestFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return VisitorRequestsService::class;
    }
}
