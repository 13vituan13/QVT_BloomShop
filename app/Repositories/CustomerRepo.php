<?php
namespace App\Repositories;

use App\Models\Customer;
use App\Interfaces\ICustomer;
use Illuminate\Support\Facades\Hash;
class CustomerRepo implements ICustomer
{   
    public function getAll()
    {
        return Customer::all();
    }
    public function getById($id)
    {
        return Customer::leftJoin('vip_member', 'vip_member.vip_id', '=', 'customer.vip_id')
                        ->where('customer_id', $id)
                        ->select('*',
                        'customer.name AS name',
                        'vip_member.name AS vip_name')
                        ->first();
    }

    public function create(array $data)
    {
        Customer::create($data);
    }

    public function update($id, array $data)
    {
        $model = Customer::find($id);
        if (!$model) {
            return false;
        }

        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = Customer::find($id);
        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
    function getList(array $data, $pagination = null)
    {
        $customer_id = isset($data['customer_id']) ? $data['customer_id'] : null;
        $name = isset($data['name']) ? $data['name'] : null;
        $phone = isset($data['phone']) ? $data['phone'] : null;
        $email = isset($data['email']) ? $data['email'] : null;
        $vip_id = isset($data['vip_id']) ? $data['vip_id'] : null;
    
        $query = Customer::with('vip_member')
            ->with('city')
            ->with('district')->where(function ($query) {
                $query->where('customer.flg_del', '<>', 1)
                    ->orWhereNull('customer.flg_del');
            });
    
        if ($customer_id) {
            $query->where('customer.customer_id', '=', $customer_id);
        }
    
        if ($name) {
            $query->where('customer.name', 'like', '%' . $name . '%');
        }
    
        if ($phone) {
            $query->where('customer.name', 'like', '%' . $phone . '%');
        }
    
        if ($email) {
            $query->where('customer.name', 'like', '%' . $email . '%');
        }
    
        if ($vip_id) {
            $query->where('customer.vip_id', '=', $vip_id);
        }
        $query->orderBy('customer_id', 'DESC');
        $res = !$pagination ? $query->get() : $query->paginate($pagination);
        return $res;
    }
    function checkEmailExist($email)
    {
        return Customer::where('email', $email)->exists();
    }
    function checkCustomerLogin($email, $password)
    {   
        $customer = Customer::where('email', $email)->first();
        if ($customer) {
            return Hash::check($password, $customer->password);
        }
        return false;
    }
    function getCustomerLogin($email)
    {
        return Customer::where('email', $email)->first();
    }
}
