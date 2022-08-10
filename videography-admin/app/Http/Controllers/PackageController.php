<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\PackageFacade;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    use FormHelper;


    public function index(Request $request)
    {
        $response['packages'] = PackageFacade::all();
        $response['tc'] = $this;
        return view('Pages.Packages.all')->with($response);
    }

    public function store(Request $request)
    {
        PackageFacade::store($request->all());
        $response['alert-success'] = 'Package Created Successfully';
        return redirect()->route('packages.all')->with($response);
    }

    public function edit(Request $request)
    {
        $response['package'] = PackageFacade::get($request['package_id']);
        $response['tc'] = $this;
        return view('Pages.Packages.edit')->with($response);
    }

    public function update(Request $request,$package_id)
    {
        PackageFacade::update($package_id,$request->all());
        $response['alert-success'] = 'package Updated Successfully';
        return redirect()->route('packages.all')->with($response);
    }


    public function delete($package_id)
    {
        PackageFacade::delete($package_id);
        $response['alert-success'] = 'Package Deleted Successfully';
        return redirect()->back()->with($response);
    }

    public function changeStatus($package_id)
    {
        $status = PackageFacade::changeStatus($package_id);

        if ($status == 1) {
            $response['alert-success'] = 'Package Published successfully';
        } else {
            $response['alert-success'] = 'Package Drafted successfully';
        }
        return redirect()->back()->with($response);
    }
}
