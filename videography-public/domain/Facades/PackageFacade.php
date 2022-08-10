<?php

namespace domain\Facades;

use domain\Services\PackageService\PackageService;
use Illuminate\Support\Facades\Facade;

class PackageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PackageService::class;
    }
}
