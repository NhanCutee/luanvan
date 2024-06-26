<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('product') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Compund Garment <sup></sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Thống kê</span></a>
  </li> -->

  @if (auth()->user()->role == 'Admin')
  <li class="nav-item">
    <a class="nav-link" href="{{ route('product') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Sản phẩm</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('promotion') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Khuyến mãi</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('category') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Danh mục</span></a>
  </li>
  @endif

  @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'emp')
  <li class="nav-item">
    <a class="nav-link" href="{{ route('user') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Khách hàng</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('employees') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Nhân viên</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Đơn hàng</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Vận chuyển</span></a>
  </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <!-- Sidebar Message -->

</ul>
