<!-- @extends('layouts.app')

@section('title', 'Kết quả tìm kiếm Người dùng')

@section('contents')
  <h1>Kết quả tìm kiếm cho "{{ $searchTerm }}"</h1>
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
@endsection -->
