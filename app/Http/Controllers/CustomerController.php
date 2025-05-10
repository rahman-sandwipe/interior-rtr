<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Laravolt\Avatar\Facade as Avatar;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CustomerController extends Controller
{
    /** customerPage */
    public function customerPage()
    {
        return view('backend.pages.customerPage');
    }

    /** customerList */
    public function customerList()
    {
        $data['customers'] = Customer::latest()->get();
        return response()->json($data);
    }

    /** customerInsert */
    public function customerInsert(Request $request)
    {
        $customerID = IdGenerator::generate(['table' => 'customers','field' => 'customer_id','length' => 10,'prefix' => 'CID',]);
        Avatar::create($request->name)->save(public_path('/images/avatars/avatar'.$customerID.'.png')); // quality = 100
        $avatar = 'images/avatars/avatar'.$customerID.'.png';
        $data = $request->all();
        $data['customer_id'] = $customerID;
        $data['avatar'] = $avatar;
        Customer::create($data);
        return back()->with('success', 'Customer created successfully.');
    }

    /** customerDetails */
    public function getCustomer(Customer $customer)
    {
        return response()->json($customer);
    }

    /** customerEdit */
    public function editCustomer(Request $request, Customer $customer)
    {
        return response()->json($customer);
    }

    /** customerUpdate */
    public function updateCustomer(Request $request, Customer $customer)
    {
        if (!empty($customer->avatar) && file_exists(public_path($customer->avatar))) {
            @unlink(public_path($customer->avatar));
        }
        $customer->update($request->all());
        if ($request->hasFile('avatar')) {   
            $manager = new ImageManager(new Driver());
            $name_gen = uniqid().'.'.$request->file('avatar')->getClientOriginalExtension();
            $img = $manager->read($request->file('avatar'));
            $img = $img->resize(300, 300);
            $img->save(base_path('public/images/avatars/customer'.$name_gen));
            $save_url = 'images/avatars/customer'.$name_gen;
            $customer->update(['avatar' => $save_url]);
        }
        return back()->with('success', 'Customer updated successfully.');
    }

    /** customerDelete */
    public function destroyCustomer(Customer $customer)
    {
        if (!empty($customer->avatar) && file_exists(public_path($customer->avatar))) {
            @unlink(public_path($customer->avatar));
        }
        $customer->delete();
        return back()->with('success', 'Customer deleted successfully.');
    }
}
