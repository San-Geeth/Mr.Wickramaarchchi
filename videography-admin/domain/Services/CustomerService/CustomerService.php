<?php

namespace domain\Services\CustomerService;

use App\Models\Customer;
use domain\Facades\SettingFacade;
use infrastructure\Facades\ImageCropperFacade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    protected $customers;

    public function __construct()
    {
        $this->customers = new Customer();
    }

    public function all()
    {
        return $this->customers->all();
    }


    public function find($customer_id)
    {
        return $this->customers->find($customer_id);
    }


    public function store($data)
    {
        $customer = Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $customer;
    }

    public function ValidateEmail($request)
    {
        if ($request->get('email')) {
            $email = $request->get('email');

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $data = $this->customers->where('email', $email)->count();

                if ($data > 0) {
                    return ['status' => 0, "msg" => "This Email is already Used."];
                } else {
                    return ['status' => 1, "msg" => "Valid Email"];
                }
            } else {
                return ['status' => 0, "msg" => "Invalid Email"];
            }
        }
    }

    public function updatePersonal(array $data)
    {
        $this->customers = Customer::find($data['customer_id']);
        return $this->customers->update($this->editPersonal($this->customers, $data));
    }

    protected function editPersonal(Customer $customer, $data)
    {
        return array_merge($customer->toArray(), $data);
    }

    public function newBilling($data)
    {
        return $this->billing_address->create($data);
    }

    public function updatePassword($data)
    {
        $this->customers = Customer::find($data['customer_id']);
        $this->customers->password = bcrypt($data['password']);
        $this->customers->update();
    }


    public function delete($customer_id)
    {
        $customers = $this->customers->find($customer_id);
        $customers->delete();
    }
}
