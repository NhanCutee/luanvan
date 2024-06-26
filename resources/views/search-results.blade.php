@extends('layouts.app')

@section('title', 'Kết quả tìm kiếm')

@section('contents')
  <h1>Kết quả tìm kiếm cho "{{ $searchTerm }}"</h1>

  <h2>Sản phẩm</h2>
  @if ($products->isEmpty())
    <p>Không tìm thấy sản phẩm nào.</p>
  @else
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Số lượng</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td>{{ $product->product_id }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->category ? $product->category->category_name : 'N/A' }}</td>
              <td>{{ $product->amount }}</td>
              <td>{{ $product->product_price }}₫</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif

  <h2>Người dùng</h2>
  @if ($users->isEmpty())
    <p>Không tìm thấy người dùng nào.</p>
  @else
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->phone_number }}</td>
              <td>{{ $user->address }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection
