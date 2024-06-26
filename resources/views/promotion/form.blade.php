@extends('layouts.app')

@section('title', isset($promotion) ? 'Sửa thông tin chương trình khuyến mãi' : 'Thêm chương trình khuyến mãi')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ isset($promotion) ? 'Sửa thông tin chương trình khuyến mãi' : 'Thêm chương trình khuyến mãi' }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ isset($promotion) ? route('promotion.update', ['id' => $promotion->promotion_id]) : route('promotion.store') }}" method="POST">
            @csrf
            @if(isset($promotion))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="promotion_name">Tên chương trình:</label>
                <input type="text" class="form-control" id="promotion_name" name="promotion_name" value="{{ isset($promotion) ? $promotion->promotion_name : '' }}" required>
            </div>
            <div class="form-group">
                <label for="promotion_description">Mô tả:</label>
                <textarea class="form-control" id="promotion_description" name="promotion_description" required>{{ isset($promotion) ? $promotion->promotion_description : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="discount_percentage">Phần trăm giảm giá:</label>
                <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" value="{{ isset($promotion) ? $promotion->discount_percentage : '' }}" required>
            </div>
            <div class="form-group">
                <label for="promotion_start_date">Ngày bắt đầu:</label>
                <input type="date" class="form-control" id="promotion_start_date" name="promotion_start_date" value="{{ isset($promotion) ? $promotion->promotion_start_date : '' }}" required>
            </div>
            <div class="form-group">
                <label for="promotion_end_date">Ngày kết thúc:</label>
                <input type="date" class="form-control" id="promotion_end_date" name="promotion_end_date" value="{{ isset($promotion) ? $promotion->promotion_end_date : '' }}" required>
            </div>
            <div class="form-group">
                <label for="product_id">Sản phẩm:</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    @if(isset($products))
                        @foreach($products as $product)
                            <option value="{{ $product->product_id }}" {{ isset($promotion) && $promotion->product_id == $product->product_id ? 'selected' : '' }}>
                                {{ $product->product_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($promotion) ? 'Cập nhật' : 'Thêm mới' }}</button>
        </form>
    </div>
</div>
@endsection
