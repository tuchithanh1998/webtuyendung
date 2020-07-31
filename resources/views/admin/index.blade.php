@extends('admin.layout')

@section ('content')
  <div class="container-fluid" >
<div class="row">
  <div class="col-12">
      <div class="card" style="margin-top: 10px; margin-bottom: 10px;" > 
   <div class="card-header" style="background-color: red; color: black; font-weight: bold;">
    CẬP NHẬT MỚI TRONG NGÀY {{date("d-m-Y")}}
  </div>
  <div class="card-body">
  <p> Ứng viên: {{count(App\ungvien::whereDate('ngaytaohoso', '>=',date("Y-m-d"))->get())}}</p>
  <p> Nhà tuyển dụng: {{count(App\nhatuyendung::whereDate('ngaytao', '>=',date("Y-m-d"))->get())}}</p>
  <p> Tin tuyển dụng: {{count(App\tintuyendung::whereDate('ngaydangtin', '>=',date("Y-m-d"))->get())}}</p>
  </div>
</div>
  </div>
</div>
</div>
<!----->
<div class="container-fluid" >
<div class="row">
  <div class="col-12">
      <div class="card" style="margin-top: 10px; margin-bottom: 10px;" > 
   <div class="card-header" style="background-color: red; color: black; font-weight: bold;">
    TỔNG SỐ LƯỢNG ĐANG QUẢN LÝ
  </div>

  <div class="card-body">
  <p> Ứng viên: {{count(App\ungvien::all())}}</p>
  <p> Nhà tuyển dụng: {{count(App\nhatuyendung::all())}}</p>
  <p> Tin tuyển dụng: {{count(App\tintuyendung::all())}}</p>
  </div>
</div>
  </div>
</div>
</div>


@endsection
@section ('script')
@endsection