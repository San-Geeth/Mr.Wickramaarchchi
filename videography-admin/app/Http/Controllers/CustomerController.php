<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\CustomerFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends ParentController
{
    use FormHelper;

    public function index()
    {
        $response['customers'] = CustomerFacade::all();
        $response['tc'] = $this;
        return view('Pages.Customers.all')->with($response);
    }

    public function new()
    {
        return view('Pages.Customers.new');
    }

    public function store(Request $request)
    {
        $customer = CustomerFacade::store($request->all());
        $response['alert-success'] = 'New Customer Created Successfully';
        return redirect()->route('customers.edit',$customer['id'])->with($response);
    }

    public function ValidateEmail(Request $request)
    {
        return CustomerFacade::ValidateEmail($request);
    }

    public function edit($customer_id)
    {
        $response['customer'] = CustomerFacade::find($customer_id);
        $response['tc'] = $this;
        return view('Pages.Customers.edit')->with($response);
    }

    public function delete($customer_id)
    {
        CustomerFacade::delete($customer_id);
        $response['alert-success'] = 'Customer Deleted Successfully';
        return redirect()->back()->with($response);
    }

    public function updatePersonal(Request $request)
    {
        CustomerFacade::updatePersonal($request->all());
        $response['alert-success'] = 'Customer Details Updated Successfully';
        return redirect()->back()->with($response);
    }

    public function newBilling(Request $request)
    {
        CustomerFacade::newBilling($request->all());
        $response['alert-success'] = 'Customer Billing Details Stored Successfully';
        return redirect()->back()->with($response);
    }

    public function updatePassword(Request $request)
    {
        CustomerFacade::updatePassword($request->all());
        $response['alert-success'] = 'Customer Password Updated Successfully';
        return redirect()->back()->with($response);
    }

    public function updateBilling(Request $request)
    {
        CustomerFacade::updateBilling($request->all());
        $response['alert-success'] = 'Customer Billing Details Updated Successfully';
        return redirect()->back()->with($response);
    }

    public function view($customer_id)
    {
        $response['customer'] = CustomerFacade::find($customer_id);
        $response['tc'] = $this;
        return view('Pages.Customers.show')->with($response);
    }
}
