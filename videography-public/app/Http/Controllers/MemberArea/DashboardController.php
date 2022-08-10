<?php

namespace App\Http\Controllers\MemberArea;

use App\Http\Controllers\Controller;
use domain\Facades\CustomerFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends ParentController
{
    public function dashboard()
    {
        return view('MemberArea.Pages.Dashboard.index');
    }
    public function basicInformation()
    {
        return view('MemberArea.Pages.Profile.Basic.index');
    }
    public function billingAddress(){
        return view('MemberArea.Pages.Profile.Billing.index');
    }
    public function privacySetting()
    {
        return view('MemberArea.Pages.Profile.Privacy.index');
    }

    public function checkPassword(Request $request)
    {
        return CustomerFacade::checkPass($request->all());
    }

    public function updatePassword(Request $request)
    {
        CustomerFacade::updatePassword(Auth::id(), $request->all());
        $response['alert-success'] = 'Privacy Updated Successfully';
        return redirect()->route('privacy.setting')->with($response);
    }

    public function updatePersonal(Request $request)
    {
        CustomerFacade::updatePersonal(Auth::id(), $request->all());
        $response['alert-success'] = 'Information Updated Successfully';
        return redirect()->route('basic.information')->with($response);
    }

    public function updateBilling(Request $request)
    {
        CustomerFacade::updateBilling($request->all());
        $response['alert-success'] = 'Information Updated Successfully';
        return redirect()->route('billing.address')->with($response);
    }

}
