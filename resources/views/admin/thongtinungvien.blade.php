@extends('admin.layout')
@section ('link')
<link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section ('content')
<div class="container-fluid" >
  <div class="row">
    <div class="col-12">
      <div class="card" style="margin-top: 10px; margin-bottom: 10px;" >
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Họ & Tên</th>
                  <th>Email</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Trạng thái</th>

                  @if(Auth::guard('admin')->user()->quyen==1)
                  <th>Chỉnh sửa bởi</th>
                  @endif
                  <th>             </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>STT</th>
                  <th>Họ & Tên</th>
                  <th>Email</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Trạng thái</th>
                  @if(Auth::guard('admin')->user()->quyen==1)
                  <th>Chỉnh sửa bởi</th>
                  @endif
                  <th>             </th>
                </tr>
              </tfoot>
              <tbody>

                <?php
                $stt=0;
                foreach ($data as $key => $value):
                 $stt++; ?>
                 <tr>
                  <td>{{$stt}}</td>
                  <td>{{$value->hoten}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->diachi}} @if($value->id_thanhpho!=null) {{$value->thanhpho->tenthanhpho}}
                  @endif</td>
                  <td>{{$value->sodienthoai}}</td>
                  <td><?php
                  if ($value->trangthai==1) {
                    echo "Mở";
                  }
                  else
                    echo "Khóa";

                  ?></td>
                  @if(Auth::guard('admin')->user()->quyen==1)
 <th>
  @if($value->id_admin)
  {{$value->id_admin}}-{{$value->admin->ten}}
  @endif
</th>
@endif
                  <td><button type="button" data-toggle="modal" data-target="#exampleModal{{$key}}"  class="btn btn-light">Chi tiết</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">   <form action="admin/ung-vien/{{$value->id}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: red;">THÔNG TIN ỨNG VIÊN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                           <div class="card">
                             <div class="card-body row">
                              <ul class="list-unstyled col-6">
                                <li><h6 style="font-weight: bold;">Họ và tên:</h6>  {{$value->hoten}}</li>
                                <li><h6 style="font-weight: bold;">Địa chỉ:</h6>  {{$value->diachi}} @if($value->id_thanhpho!=null) {{$value->thanhpho->tenthanhpho}}
                                @endif</li>
                                <li><h6 style="font-weight: bold;">Email:</h6> {{$value->email}}</li>
                                <li><h6 style="font-weight: bold;">Số điện thoại:</h6> {{$value->sodienthoai}}</li>
                                <li><h6 style="font-weight: bold;">Ngày sinh:</h6> {{$value->ngaysinh}}</li>
                                <li><h6 style="font-weight: bold;">Giới tính:</h6>
                                  @if($value->gioitinh==1)
                                  Nam
                                  @else
                                  Nữ
                                  @endif
                                </li>
                                <li><h6 style="font-weight: bold;">Tình trạng hôn nhân:</h6> @if($value->tinhtranghonnhan==1)
                                  Độc thân
                                  @else
                                  Đã có gia đình
                                @endif</li>
                              </ul>
                              <ul class="list-unstyled col-6">
                                <li><h6 style="font-weight: bold;">Mục tiêu:</h6>  {{$value->muctieu}}</li>
                                <li><h6 style="font-weight: bold;">Kỹ năng sở trường:</h6>  {{$value->kynangsotruong}}</li>
                                <li><h6 style="font-weight: bold;">Sở thích:</h6>  {{$value->sothich}}</li>
                                @if($value->anhdaidien!="")
                                <li><img style="width: 300px; height: 300px;"  src="upload/img/ungvien/anhdaidien/{{$value->anhdaidien}}"></li>
                                @endif
                              </ul>
                            </div>
                          </div>

                          <h6 class="modal-title" id="exampleModalLabel" style="color: red; text-decoration: underline;">Chọn chức năng!</h6>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Radios"  value="1" 
                              <?php if($value->trangthai==1) echo "checked"; ?>
                              >
                              Mở
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="Radios" value="2" <?php if($value->trangthai==2) echo "checked"; ?>>
                              Khóa
                            </label>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                          <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</div>





@endsection
@section ('script')



<!-- Page level plugins -->
<script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="admin/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Page level custom scripts -->
<script src="admin/js/demo/datatables-demo.js"></script>
@endsection