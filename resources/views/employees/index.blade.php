@extends('layouts.app')

@section('title', 'Danh sách nhân viên')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách nhân viên</h6>
    </div>
    <div class="card-body">
        @if (auth()->user()->role == 'Admin')
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Thêm nhân viên</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        @if (auth()->user()->role == 'Admin')
                        <th>Thao tác</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $u)
                    @if ($u->role === 'emp')
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->phone_number }}</td>
                        <td>{{ $u->address }}</td>
                        @if (auth()->user()->role == 'Admin')
                        <td>
                            <a href="{{ route('employees.edit', $u->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('employees.destroy', $u->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?')">Xóa</button>
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
