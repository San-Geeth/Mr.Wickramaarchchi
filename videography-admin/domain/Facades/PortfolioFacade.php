<?php

namespace domain\Facades;

use domain\Services\PortfolioService\PortfolioService;
use Illuminate\Support\Facades\Facade;


class PortfolioFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PortfolioService::class;
    }
}
