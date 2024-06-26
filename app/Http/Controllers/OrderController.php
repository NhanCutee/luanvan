<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', ['orders' => $orders]);
    }

    public function create()
    {
        // Tạo hàm để hiển thị form tạo đơn hàng
    }

    public function store(Request $request)
    {
        // Tạo hàm để lưu thông tin đơn hàng vào database
    }

    public function show($id)
    {
        // Tạo hàm để hiển thị thông tin chi tiết của đơn hàng
    }

    public function edit($id)
    {
        // Tạo hàm để hiển thị form chỉnh sửa thông tin đơn hàng
    }

    public function update(Request $request, $id)
    {
        // Tạo hàm để cập nhật thông tin của đơn hàng trong database
    }

    public function destroy($id)
    {
        // Tạo hàm để xóa đơn hàng khỏi database
    }
}
