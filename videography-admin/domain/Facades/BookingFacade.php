<?php

namespace domain\Facades;

use domain\Services\BookingService\BookingService;
use Illuminate\Support\Facades\Facade;


class BookingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return BookingService::class;
    }
}
