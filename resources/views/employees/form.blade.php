@extends('layouts.app')

@section('title', isset($user) ? 'Sửa thông tin người dùng' : 'Thêm người dùng')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? 'Sửa thông tin người dùng' : 'Thêm người dùng' }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ isset($user) ? route('user.update', ['id' => $user->id]) : route('user.save') }}" method="POST">
            @csrf
            @if(isset($user))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Nam" {{ isset($user) && $user->gender === 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ isset($user) && $user->gender === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone_number">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ isset($user) ? $user->phone_number : '' }}" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ isset($user) ? $user->address : '' }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}" required>
            </div>
            @if (!isset($user)) <!-- Chỉ hiển thị mật khẩu khi thêm mới người dùng -->
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            @endif
            <!-- <div class="form-group">
                <label for="role">Cấp độ:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="Admin" {{ isset($user) && $user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ isset($user) && $user->role === 'User' ? 'selected' : '' }}>User</option>
                </select>
            </div> -->
            <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Cập nhật' : 'Thêm mới' }}</button>
        </form>
    </div>
</div>
@endsection
