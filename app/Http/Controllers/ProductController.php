<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'images')->get();
        return view('product.index', ['data' => $products]);
    }

    public function add()
    {

        $category = Category::all();
        return view('product.form', ['category' => $category]);
    }

    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $category = Category::all();
        return view('product.form', ['product' => $product, 'category' => $category]);
    }

    public function save(Request $request)
    {
        $data = $request->only([
            'product_name', 'product_description',
            'product_size', 'product_color','amount', 'product_price',
            'category_id'
        ]);
    
        // Tạo sản phẩm mới
        $product = Product::create($data);
    
        // Kiểm tra và lưu các hình ảnh
        $this->processImages($product, $request);
    
        return redirect()->route('product.index');
    }
    
    public function update($id, Request $request)
    {
        $data = $request->only([
            'product_name', 'product_description',
            'product_size', 'product_color','amount', 'product_price',
            'category_id', 'manager_id'
        ]);
    
        // Tìm sản phẩm cần cập nhật
        $product = Product::findOrFail($id);
    
        // Cập nhật thông tin sản phẩm
        $product->update($data);
    
        // Xóa hình ảnh cũ và thêm mới
        $this->deleteOldImages($product);
        $this->processImages($product, $request);
    
        return redirect()->route('product.index');
    }
    private function processImages($product, $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('img', 'public');
                $image = new Image(['image_path' => $path]);
                $product->images()->save($image);
            }
        }
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $products = Product::where('product_id', 'LIKE', "%$searchTerm%")
                            ->orWhere('product_name', 'LIKE', "%$searchTerm%")
                            ->orWhere('category_id', 'LIKE', "%$searchTerm%")
                            ->orWhere('amount', 'LIKE', "%$searchTerm%")
                            ->paginate(10);
    
        return view('product.search-results', compact('products', 'searchTerm'));
    }
    

    

    private function deleteOldImages($product)
    {
        foreach ($product->images as $image) {
            // Delete from storage
            Storage::disk('public')->delete($image->image_path);
            // Delete image record from database
            $image->delete();
        }
    }
    
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        // Xóa hình ảnh liên quan
        $this->deleteOldImages($product);

        // Xóa các bản ghi liên quan trong bảng order_promotion

        // Xóa sản phẩm
        $product->delete();

        return redirect()->route('product.index');
    }
}
