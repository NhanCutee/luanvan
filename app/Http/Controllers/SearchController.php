<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        
        // Tìm kiếm sản phẩm
        $products = Product::where('product_name', 'LIKE', "%$searchTerm%")
                            ->orWhere('product_id', 'LIKE', "%$searchTerm%")
                            ->paginate(10);
                            
        // Tìm kiếm người dùng
        // $users = User::where('name', 'LIKE', "%$searchTerm%")
        //             ->orWhere('email', 'LIKE', "%$searchTerm%")
        //             ->orWhere('phone_number', 'LIKE', "%$searchTerm%")
        //             ->orWhere('address', 'LIKE', "%$searchTerm%")
        //             ->paginate(10);
        
        // Kiểm tra từng loại kết quả và trả về view tương ứng
        if (strpos(url()->current(), 'product') !== false) {
            return view('product.index', compact('products', 'searchTerm'));
        } elseif (strpos(url()->current(), 'users') !== false) {
            return view('users.index', compact('users', 'searchTerm'));
        } else {
            // Nếu không phát hiện trang cụ thể, có thể trả về một view mặc định
            return view('search-results', compact('products', 'users', 'searchTerm'));
        }
    }
}
