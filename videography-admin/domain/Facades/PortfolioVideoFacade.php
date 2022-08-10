<?php

namespace domain\Facades;

use domain\Services\PortfolioService\PortfolioVideoService;
use Illuminate\Support\Facades\Facade;


class PortfolioVideoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PortfolioVideoService::class;
    }
}
