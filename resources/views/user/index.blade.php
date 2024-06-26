@extends('layouts.app')

@section('title', 'Danh sách người dùng')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dữ liệu</h6>
    </div>
    <div class="card-body">
    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'emp')
        <a href="{{ route('user.add') }}" class="btn btn-primary mb-3">Thêm người dùng</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'emp')
                        <th>Thao tác</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                    @if ($u->role === null) <!-- Chỉ hiển thị những user có role = null -->
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->phone_number }}</td>
                        <td>{{ $u->address }}</td>
                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'emp')
                        <td>
                            <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('user.delete', $u->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
