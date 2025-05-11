<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**  index  */
    public function inventoryPage()
    {
        $data['products'] = Product::all();
        return view('backend.pages.inventoryPage', $data);
    }

    /**  inventoryList  */
    public function inventoryList()
    {
        $data['inventories'] = Inventory::with('product')->get();
        return response()->json($data);
    }

    /**  inventoryInsert  */
    public function inventoryInsert(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'remarks' => 'required',
            'type' => 'required',
        ]);
        Inventory::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'remarks' => $request->remarks,
            'type' => $request->type,
        ]);
        return back()->with('success', 'Inventory created successfully.');
    }

    /**  getInventory  */
    public function getInventory(Inventory $inventory)
    {
        $inventory = $inventory->load('product');
        return response()->json($inventory);
    }

    /**  editInventory  */
    public function editInventory(Inventory $inventory)
    {
        $inventory = $inventory->load('product');
        return response()->json($inventory);
    }

    /**  updateInventory  */
    public function updateInventory(Request $request, $id)
    {
        $data = Inventory::find($id)->update($request->all());
        return response()->json($data);
    }


    /**  destroyInventory  */
    public function destroyInventory(Inventory $inventory)
    {
        $data['inventory'] = Inventory::find($inventory->id);
        if ($data['inventory']) {
            $data['inventory']->delete();
            return response()->json(['success' => 'Inventory deleted successfully.']);
        }
        return response()->json(['error' => 'Inventory not found.'], 404);
    }
}
