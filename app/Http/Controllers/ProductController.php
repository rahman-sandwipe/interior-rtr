<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProductController extends Controller
{
    /** Frontend Pages */
    public function shop(){
        return view('frontend.pages.shopPages');
    }

    /** Backend Products Pages */
    public function productPage()
    {
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('backend.pages.productsPage', $data);
    }

    /** Backend Product List */
    public function productList() {
        $data['products'] = Product::with('category', 'supplier')->get();
        return response()->json($data);
    }

    /** Backend Product Insert */
    public function productInsert(Request $request)
    {
        // $request->dd($request);

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image = $image->resize(1000, 1000);
            $image->save(base_path('public/images/products/product' . $name_gen));
            $save_url = 'images/products/product' . $name_gen;
        }
        $barcodeID = IdGenerator::generate(['table'=>'products', 'field'=>'barcode', 'length'=>8, 'prefix'=>'PID']);
        Product::create([
            'barcode' => $barcodeID,
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'cost' => $request['cost'],
            'quantity' => $request['quantity'],
            'image' => $request['image'],
            'category_id' => $request['category_id'],
            'supplier_id' => $request['supplier_id'],
            'status' => $request['status'],
            'image' => $save_url
        ]);

        return back()->with('success', 'Product created successfully.');
    }

    /** Backend getProduct */
    public function getProduct(Product $product) {
        $product = $product->load('category', 'supplier');
        return response()->json($product);

    }

    /** Backend Product Edit */
    public function productEdit(Product $product) {
        $data['editProduct'] = Product::with('category', 'supplier')->find($product->id);
        return response()->json($data);
    }

    public function destroyProduct(Product $product) {
        $data['product'] = Product::find($product->id);
        if ($data['product']) {
            if(file_exists($product->image)) {
                $product->deleteImage();
            }
            $data['product']->delete();
            return response()->json(['success' => 'Product deleted successfully.']);
        }
        return response()->json(['error' => 'Product not found.'], 404);
    }
}
