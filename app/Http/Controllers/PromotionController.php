<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Product;

class PromotionController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách các chương trình khuyến mãi
        $promotions = Promotion::all(); // Đổi $promotion thành $promotions
        return view('promotion.index', compact('promotions'));
    }

    public function create()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm từ database
        return view('promotion.form', compact('products'));
    }

    public function store(Request $request)
    {
        // Lưu thông tin chương trình khuyến mãi vào database
        $request->validate([
            'promotion_name' => 'required|string|max:50',
            'promotion_description' => 'nullable|string|max:255',
            'discount_percentage' => 'required|numeric|min:0|max:100', // Thêm validation cho discount_percentage
            'promotion_start_date' => 'required|date',
            'promotion_end_date' => 'required|date|after_or_equal:promotion_start_date',
            'product_id' => 'required|exists:product,product_id',
        ]);

        Promotion::create($request->all());
        return redirect()->route('promotion.index')->with('success', 'Chương trình khuyến mãi đã được tạo thành công.');
    }

    public function show($id)
    {
        // Hiển thị thông tin chi tiết của một chương trình khuyến mãi cụ thể
        $promotion = Promotion::findOrFail($id);
        return view('promotion.show', compact('promotion'));
    }
    
    public function edit($id)
    {
        // Hiển thị form để chỉnh sửa một chương trình khuyến mãi
        $promotion = Promotion::findOrFail($id);
        $products = Product::all(); // Lấy tất cả sản phẩm từ database
        return view('promotion.form', compact('promotion', 'products'));
    }
    
    public function update(Request $request, $id)
    {
        // Cập nhật thông tin của chương trình khuyến mãi trong database
        $request->validate([
            'promotion_name' => 'required|string|max:50',
            'promotion_description' => 'nullable|string|max:255',
            'discount_percentage' => 'required|numeric|min:0|max:100', // Thêm validation cho discount_percentage
            'promotion_start_date' => 'required|date',
            'promotion_end_date' => 'required|date|after_or_equal:promotion_start_date',
            'product_id' => 'required|exists:product,product_id',
        ]);

        $promotion = Promotion::findOrFail($id);
        $promotion->update($request->all());
        return redirect()->route('promotion.index')->with('success', 'Thông tin chương trình khuyến mãi đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        // Xóa chương trình khuyến mãi khỏi database
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->route('promotion.index')->with('success', 'Chương trình khuyến mãi đã được xóa thành công.');
    }
}
