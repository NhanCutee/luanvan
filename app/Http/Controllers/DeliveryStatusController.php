<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryStatus;

class DeliveryStatusController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách trạng thái giao hàng
    }

    public function create()
    {
        // Hiển thị form tạo mới trạng thái giao hàng
    }

    public function store(Request $request)
    {
        // Lưu trạng thái giao hàng mới vào cơ sở dữ liệu
    }

    public function show($id)
    {
        // Hiển thị thông tin chi tiết của một trạng thái giao hàng cụ thể
    }

    public function edit($id)
    {
        // Hiển thị form chỉnh sửa thông tin trạng thái giao hàng
    }

    public function update(Request $request, $id)
    {
        // Cập nhật thông tin của trạng thái giao hàng trong cơ sở dữ liệu
    }

    public function destroy($id)
    {
        // Xóa trạng thái giao hàng khỏi cơ sở dữ liệu
    }
}
