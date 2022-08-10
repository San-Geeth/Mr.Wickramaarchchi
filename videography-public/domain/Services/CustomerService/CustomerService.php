<?php

namespace domain\Services\CustomerService;

use App\Models\Customer;
use App\Models\CustomerBillingAddress;
use domain\Facades\SettingFacade;
use Illuminate\Support\Facades\Auth;
use infrastructure\Facades\ImageCropperFacade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    protected $customers;

    public function __construct()
    {
        $this->customers = new Customer();
        $this->billing_address = new CustomerBillingAddress();
    }

    public function all()
    {
        return $this->customers->all();
    }


    public function find($customer_id)
    {
        return $this->customers->find($customer_id);
    }

    public function validateEmail($request)
    {
        $email = $this->customers->where('email', $request['email'])->first();

        if($email){
            return 1;
        }else{
            return 0;
        }
    }

    public function updatePersonal($customer_id, $data)
    {
        $customers = $this->customers->find($customer_id);
        $customers->update($this->editPersonal($this->customers, $data));
    }

    protected function editPersonal(Customer $customer, $data)
    {
        return array_merge($customer->toArray(), $data);
    }

    public function newBilling($data)
    {
        return $this->billing_address->create($data);
    }

    public function updatePassword($customer_id, $data)
    {
        $customers = $this->customers->find($customer_id);
        $customers->password = bcrypt($data['password']);
        $customers->update();
    }

    public function updateBilling(array $data)
    {
        if (Auth::user()->billingAddress) {
            $billing_address =  $this->billing_address->find(Auth::user()->billingAddress->id);
            $billing_address->update($this->editBilling($billing_address, $data));
        } else {
            $data['customer_id'] = Auth::id();
            $this->newBilling($data);
        }
    }

    protected function editBilling(CustomerBillingAddress $billing_address, $data)
    {
        return array_merge($billing_address->toArray(), $data);
    }

    public function checkPass($request)
    {
        if (!Hash::check($request['password'], Auth::user()->password)) {
            return 'false';
        } else {
            return 'true';
        }
    }
}
