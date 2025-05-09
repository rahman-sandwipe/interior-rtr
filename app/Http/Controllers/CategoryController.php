<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categoryPage()
    {
        return view('backend.pages.categoryPage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categoryList()
    {
        $data['categories'] = Category::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function categoryInsert(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string|max:255|unique:categories',
            ]);
            $categoryID = IdGenerator::generate([
                'table' => 'categories',
                'field' => 'categoryID',
                'length' => 10,
                'prefix' => 'CID'
            ]);
            if($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $name_gen = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
                $image = $manager->read($request->file('image'));
                $image = $image->resize(600, 600);
                $image->save(base_path('public/images/category/category'.$name_gen));
                $save_url = 'images/category/category'.$name_gen;
            }
            Category::create([
                'categoryID' => $categoryID,
                'name'=> $request['name'],
                'status' => $request['status'],
                'description' => $request['description'],
                'slug' => str_replace(' ', '-', strtolower($request['name'])),
                'image' => $save_url
            ]);
            flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->success('Successfully inserted!');
            return back();
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function getCategory(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editCategory(Category $category)
    {
        $category = Category::findOrFail($category->id);
        return response()->json([
            'categoryID' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
            'image' => asset('storage/categories/' . $category->image),
            'status' => $category->status ? 'Active' : 'Inactive',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        if ($request->hasFile('image')) {
            if(file_exists($category->image)){
                unlink($category->image);
            }
            $manager = new ImageManager(new Driver());
            $name_gen = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image = $image->resize(600, 600);
            $image->save(base_path('public/images/category/category'.$name_gen));
            $save_url = 'images/category/category'.$name_gen;
            $category->image = $save_url;
        }

        $category->save();
        return response()->json(['message' => 'Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyCategory(string $id)
    {
        try{
            $category = Category::find($id);
            if (file_exists($category->image)) {
                unlink($category->image);
            }
            $category->delete();
            flash()
            ->option('position', 'bottom-right')
            ->option('timeout', 2000)
            ->success('Successfully deleted!');
            return back();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
