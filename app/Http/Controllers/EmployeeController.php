<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách nhân viên
        $employees = User::where('role', 'emp')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        // Hiển thị form tạo mới nhân viên
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Lưu thông tin nhân viên mới vào cơ sở dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ]);

        $employee = new User();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->role = 'emp';
        $employee->phone = $request->phone;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show($id)
    {
        // Hiển thị thông tin chi tiết của một nhân viên cụ thể
        $employee = User::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        // Hiển thị form chỉnh sửa thông tin nhân viên
        $employee = User::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        // Cập nhật thông tin của nhân viên trong cơ sở dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ]);

        $employee = User::findOrFail($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        if ($request->password) {
            $request->validate(['password' => 'string|min:8|confirmed']);
            $employee->password = Hash::make($request->password);
        }
        $employee->phone = $request->phone;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        // Xóa thông tin nhân viên khỏi cơ sở dữ liệu
        $employee = User::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
