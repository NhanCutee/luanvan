@extends('layouts.app')

@section('title', 'Danh sách chương trình khuyến mãi')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách chương trình khuyến mãi</h6>
    </div>
    <div class="card-body">
        @if (auth()->user()->role == 'Admin')
        <a href="{{ route('promotion.create') }}" class="btn btn-primary mb-3">Thêm mới khuyến mãi</a>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên chương trình</th>
                        <th>Mô tả</th>
                        <th>Giảm (%)</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>ID sản phẩm</th>
                        @if (auth()->user()->role == 'Admin')
                        <th>Thao tác</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promotions as $promo) <!-- Đổi tên biến $promotion thành $promo -->
                    <tr>
                        <td>{{ $promo->promotion_id }}</td>
                        <td>{{ $promo->promotion_name }}</td>
                        <td>{{ $promo->promotion_description }}</td>
                        <td>{{ $promo->discount_percentage }}</td> <!-- Hiển thị discount_percentage thay vì promotion_description -->
                        <td>{{ $promo->promotion_start_date }}</td>
                        <td>{{ $promo->promotion_end_date }}</td>
                        <td>{{ $promo->product_id }}</td>
                        @if (auth()->user()->role == 'Admin')
                        <td>
                            <a href="{{ route('promotion.edit', $promo->promotion_id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('promotion.destroy', $promo->promotion_id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa chương trình khuyến mãi này?')">Xóa</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
