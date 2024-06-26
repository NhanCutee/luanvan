<!-- @extends('layouts.app')

@section('title', 'Kết quả tìm kiếm')

@section('contents')
  <h1>Kết quả tìm kiếm cho "{{ $searchTerm }}"</h1>
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
            <th></th>
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
              <td>
                <a href="{{ route('product.edit', $product->product_id) }}" class="btn btn-warning">Sửa</a>
                <form action="{{ route('product.delete', $product->product_id) }}" method="POST" style="display: inline;">
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
  @endif
@endsection -->
