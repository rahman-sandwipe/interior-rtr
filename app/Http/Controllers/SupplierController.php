<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
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
            $request->validate([
                'company' => 'required|string|max:255|unique:suppliers',
                'name' => 'required|string|max:255|unique:suppliers',
                'email' => 'required|string|email|max:255|unique:suppliers',
                'phone' => 'required|string|max:255|unique:suppliers',
                'status' => 'nullable|enum:active,inactive',
            ]);
            $supplierID = IdGenerator::generate([
                'table' => 'suppliers',
                'field' => 'supplierID',
                'length' => 10,
                'prefix' => 'SID'
            ]);
            Supplier::create([
                'supplierID'    => $supplierID,
                'company'       => $request['company'],
                'name'          => $request['name'],
                'email'         => $request['email'],
                'phone'         => $request['phone'],
                'address'       => $request['address'],
                'status'        => $request['status'],
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
        $data['supplier'] = $supplier;
        return response()->json($data);
    }

    /** Backend Supplier Update */
    public function updateSupplier(Request $request)
    {
        try{
            $request->validate([
                'company' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|max:255',
                'status' => 'nullable|enum:active,inactive',
            ]);
            $supplier = Supplier::findOrFail($request->id);
            $supplier->company = $request->company;
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->status = $request->status;
            $supplier->save();
            flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->success('Successfully Updated!');
            return back();
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
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
