<?php

namespace domain\Facades;

use domain\Services\EventService\EventService;
use Illuminate\Support\Facades\Facade;

class EventFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return EventService::class;
    }
}
