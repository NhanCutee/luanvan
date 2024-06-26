@extends('layouts.app')

@section('title', 'Danh mục')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Dữ liệu</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('category.add') }}" class="btn btn-primary mb-3">Thêm danh mục</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Mã</th>
              <th>Tên danh mục</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($category as $category)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $category->category_name }}</td>
                <td>
                  <a href="{{ route('category.edit', $category->category_id) }}" class="btn btn-warning">Sửa</a>
                  <form action="{{ route('category.delete', $category->category_id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa thể loại này không?')">Xóa</button>
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

