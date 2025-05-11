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
        $data['inventories'] = Inventory::all();
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
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'remarks' => $request->remarks,
            'type' => $request->type,
            'user_id' => Auth::user() ? Auth::user()->id : null // or some default user ID
        ]);
        return back()->with('success', 'Inventory created successfully.');
    }

    /**  getInventory  */
    public function getInventory(Inventory $inventory)
    {
        $data['inventory'] = Inventory::find($inventory->id);
        return response()->json($data);
    }

    /**  editInventory  */
    public function editInventory(Inventory $inventory)
    {
        $data['editInventory'] = Inventory::find($inventory->id);
        return response()->json($data);
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
