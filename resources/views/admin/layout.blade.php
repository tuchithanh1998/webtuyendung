<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="{{asset('')}}">
  <title>Trang chủ Admin</title>
  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
 @yield('link')
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin/index">
        <div class="sidebar-brand-text mx-3" style="color: red;">Quản trị Admin </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <span>Quản lý Nhà tuyển dụng</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="admin/thongtinnhatuyendung">Thông tin cá nhân</a>
            <a class="collapse-item" href="admin/tintuyendung">Tin tuyển dụng</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider">
      <!--------------------------->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <span>Quản lý Ứng viên</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="admin/thongtinungvien">Thông tin cá nhân</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider">
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities">
          <span>Quản lý Thông số</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="admin/thong-so/thanh-pho">Thành phố</a>
            <a class="collapse-item" href="admin/thong-so/cap-bac">Cấp bậc</a>
            <a class="collapse-item" href="admin/thong-so/hinh-thuc-lam-viec">Hình thức làm việc</a>
            <a class="collapse-item" href="admin/thong-so/kinh-nghiem">Kinh nghiệm</a>
            <a class="collapse-item" href="admin/thong-so/trinh-do">Trình độ</a>
            <a class="collapse-item" href="admin/thong-so/nganh-nghe">Ngành nghề</a>
            <a class="collapse-item" href="admin/thong-so/ky-nang">Kỹ năng</a>
            <a class="collapse-item" href="admin/thong-so/quy-mo-nhan-su">Quy mô nhân sự</a>
            <a class="collapse-item" href="admin/thong-so/muc-luong">Mức lương</a>
            <a class="collapse-item" href="admin/thong-so/ngoai-ngu">Ngoại ngữ</a>
          </div>
        </div>
      </li>
    </ul>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          </form>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow">              
              <a class="dropdown-item" style="color: red;">
                {{Auth::guard('admin')->user()->ten}}
              </a>  <!--<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::guard('admin')->user()->ten}}</span>--></li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" style="color: red;">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
              </a>
            </li>
          </ul>
        </nav>
         @yield('content')
      </div>
  <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Tuyển dụng STU 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Chọn "Đăng xuất" nếu như bạn muốn kết thúc phiên làm việc này.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          <a class="btn btn-primary" href="admin/logout">Đăng xuất</a> 
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>
         @yield('script')
</body>
</html>
