<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Laravolt\Avatar\Facade as Avatar;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SupplierController extends Controller
{
    /** Backend Supplier Page */
    public function supplierPage()
    {
        return view('backend.pages.supplierPage');
    }

    /** Backend Supplier List */
    public function supplierList()
    {
        $data['suppliers'] = Supplier::all();
        return response()->json($data);
    }

    /** Backend Supplier Insert */
    public function supplierInsert(Request $request)
    {
        try{
            $supplierID = IdGenerator::generate([
                'table' => 'suppliers',
                'field' => 'supplierID',
                'length' => 10,
                'prefix' => 'SID'
            ]);
            if ($request->hasFile('logo')) {
                $manager = new ImageManager(new Driver());
                $name_gen = $supplierID .'.'.$request->file('logo')->getClientOriginalExtension();
                $img = $manager->read($request->file('logo'));
                $img = $img->resize(300, 90);
                $img->save(base_path('public/images/brands/brand_logo'.$name_gen));
                $save_url = 'images/brands/brand_logo'.$name_gen;
            }else{
                Avatar::create($request->name)->save(public_path('/images/brands/brand_logo'.$supplierID.'.png')); // quality = 100
                $save_url = 'images/brands/brand_logo'.$supplierID.'.png';
            }
            Supplier::create([
                'supplierID'    => $supplierID,
                'company'       => $request['company'],
                'name'          => $request['name'],
                'email'         => $request['email'],
                'phone'         => $request['phone'],
                'address'       => $request['address'],
                'status'        => $request['status'],
                'logo'          => $save_url
            ]);
            flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->success('Successfully Inserted!');
            return back();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /** Backend Supplier Get Show */
    public function getSupplier(Supplier $supplier)
    {
        return response()->json($supplier);
    }

    /** Backend Supplier Edit */
    public function editSupplier(Supplier $supplier)
    {
        return response()->json($supplier);
    }

    /** Backend Supplier Update */
    public function updateSupplier(Request $request, Supplier $supplier)
    {
        if (!empty($supplier->logo) && file_exists(public_path($supplier->logo))) {
            @unlink(public_path($supplier->logo));
        }
        $supplier->update($request->all());
        if ($request->hasFile('logo')) {   
            $manager = new ImageManager(new Driver());
            $name_gen = $supplier->supplierID .'.'.$request->file('logo')->getClientOriginalExtension();
            $img = $manager->read($request->file('logo'));
            $img = $img->resize(300, 90);
            $img->save(base_path('public/images/brands/brand_logo'.$name_gen));
            $save_url = 'images/brands/brand_logo'.$name_gen;
            $supplier->update(['logo' => $save_url]);
        }
        return back()->with('success', 'supplier updated successfully.');
    }

    /** Backend Supplier Delete */
    public function destroySupplier(Supplier $supplier)
    {
        try{
            $supplier->delete();
            flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->success('Successfully Deleted!');
            return back();
        }catch(Exception $e){
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ],500
            );
        }
    }
}
