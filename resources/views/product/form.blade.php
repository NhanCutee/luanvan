@extends('layouts.app')

@section('title', '')

@section('contents')
<form action="{{ isset($product) ? route('product.update', $product->product_id) : route('product.save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($product) ? 'Sửa sản phẩm' : 'Thêm sản phẩm' }}</h6>
                </div>
                <div class="card-body">
                
                    <div class="form-group">
                        <label for="product_name">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ isset($product) ? $product->product_name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="product_description">Mô tả</label>
                        <textarea class="form-control" id="product_description" name="product_description">{{ isset($product) ? $product->product_description : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_size">Kích cỡ</label>
                        <select name="product_size" id="product_size" class="custom-select">
                            <option value="" selected disabled hidden>-- Chọn kích cỡ --</option>
                            <option value="S" {{ isset($product) && $product->product_size == 'S' ? 'selected' : '' }}>S</option>
                            <option value="M" {{ isset($product) && $product->product_size == 'M' ? 'selected' : '' }}>M</option>
                            <option value="L" {{ isset($product) && $product->product_size == 'L' ? 'selected' : '' }}>L</option>
                            <option value="XL" {{ isset($product) && $product->product_size == 'XL' ? 'selected' : '' }}>XL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_color">Màu sắc</label>
                        <select name="product_color" id="product_color" class="custom-select">
                            <option value="" selected disabled hidden>-- Chọn màu sắc --</option>
                            <option value="Trắng" {{ isset($product) && $product->product_color == 'Trắng' ? 'selected' : '' }}>Trắng</option>
                            <option value="Đen" {{ isset($product) && $product->product_color == 'Đen' ? 'selected' : '' }}>Đen</option>
                            <option value="Xám" {{ isset($product) && $product->product_color == 'Xám' ? 'selected' : '' }}>Xám</option>
                            <option value="Hồng" {{ isset($product) && $product->product_color == 'Hồng' ? 'selected' : '' }}>Hồng</option>
                            <option value="Đỏ" {{ isset($product) && $product->product_color == 'Đỏ' ? 'selected' : '' }}>Đỏ</option>
                            <option value="Nâu" {{ isset($product) && $product->product_color == 'Nâu' ? 'selected' : '' }}>Nâu</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="product_color" name="product_color" value="{{ isset($product) ? $product->product_color : '' }}"> -->
                    </div>
                                        
                    <div class="form-group">
                        <label for="product_price">Số lượng</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ isset($product) ? $product->amount : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Giá</label>
                        <input type="number" class="form-control" id="product_price" name="product_price" value="{{ isset($product) ? $product->product_price : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Danh mục</label>
                        <select name="category_id" id="category_id" class="custom-select">
                            <option value="" selected disabled hidden>-- Chọn danh mục --</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->category_id }}" {{ isset($product) && $product->category_id == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="images">Hình ảnh</label>
                    <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                        @if(isset($product) && $product->images)
                            <div class="mt-3">
                                <h6>Hình đã chọn:</h6>
                                <div class="row">
                                    @foreach($product->images as $image)
                                        <div class="col-md-3">
                                            <img src="{{ asset('storage/' . $image->path) }}" class="img-thumbnail" alt="Product Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
