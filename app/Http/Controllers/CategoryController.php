<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product; 
use App\Models\Image;
use App\Models\OrderPromotion;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index', ['category' => $category]);
    }

    public function add()
    {
        return view('category.form');
    }

    public function save(Request $request)
    {
        Category::create([
            'category_name' => $request->name,
        ]);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.form', ['category' => $category]);
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->name,
        ]);

        return redirect()->route('category.index');
    }

        public function delete($id)
        {
            $category = Category::findOrFail($id);
    
            $products = Product::where('category_id', $id)->get();
    
            foreach ($products as $product) {
                Image::where('product_id', $product->id)->delete();
    
                $product->delete();
            }
    
            $category->delete();
    
            return redirect()->route('category.index');
        }
    
    
}
