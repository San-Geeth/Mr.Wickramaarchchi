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


    public function store($data)
    {
        return $this->package->create($data);
    }

    public function get($package_id)
    {
        return $this->package->find($package_id);
    }

    public function update($package_id, array $data): void
    {
        $package = $this->package->find($package_id);
        $package->update($this->edit($package, $data));
    }


    protected function edit(Package $package, $data): array
    {
        return array_merge($package->toArray(), $data);
    }

    public function delete($package_id)
    {
        $package = $this->package->find($package_id);
        return $package->delete();
    }


    public function changeStatus($package_id)
    {
        $package = $this->package->find($package_id);

        if ($package->status == 0) {
            $package->status = 1;
            $package->update();
            return 1;
        } else {
            $package->status = 0;
            $package->update();
            return 0;
        }
    }
}
