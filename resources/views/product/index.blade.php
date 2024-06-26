@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Dữ liệu</h6>
    </div>
    <div class="card-body">
      @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'emp')
        <a href="{{ route('product.add') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Mã</th>
              <th>Tên sản phẩm</th>
              <th>Danh mục</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <td>{{ $row->product_id }}</td>
                <td>{{ $row->product_name }}</td>
                <td>{{ $row->category ? $row->category->category_name : 'N/A' }}</td>
                <td>{{ $row->amount }}</td>
                <td>{{ $row->product_price }}₫</td>
                <td>
                  <a href="{{ route('product.edit', $row->product_id) }}" class="btn btn-warning">Sửa</a>
                  <form action="{{ route('product.delete', $row->product_id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
