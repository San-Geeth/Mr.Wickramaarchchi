<?php

namespace domain\Services\PackageService;

use App\Models\Package;
use infrastructure\Facades\ImageCropperFacade;
use Illuminate\Support\Facades\File;
use infrastructure\Facades\ImagesFacade;

class PackageService
{
    protected $package;

    public function __construct()
    {
        $this->package = new Package();
    }

    public function all()
    {
        return $this->package->all();
    }

    public function getActive()
    {
        return $this->package->getActive();
    }

    public function get($package_id)
    {
        return $this->package->find($package_id);
    }

}
