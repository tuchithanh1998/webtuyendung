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
                      <th>Email</th>
                      <th>Họ & Tên</th>
                      <th>Địa chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Ngày sinh</th>
                         <th>Trạng thái</th>
                      <th>             </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>Email</th>
                      <th>Họ & Tên</th>
                      <th>Địa chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Ngày sinh</th>
                         <th>Trạng thái</th>
                      <th>             </th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                    <?php foreach ($data as $key => $value): ?>
  <tr>
                      <td>{{$value->email}}</td>
                      <td>{{$value->hoten}}</td>
                      <td>{{$value->diachi}} {{$value->thanhpho->tenthanhpho}}</td>
                      <td>{{$value->sodienthoai}}</td>
                      <td>{{$value->ngaysinh}}</td>
                      <td><?php
                          if ($value->trangthai==1) {
                            echo "Mở";
                          }
                          else
                            echo "Khóa";

                       ?></td>
                      <td><button type="button" data-toggle="modal" data-target="#exampleModal{{$key}}"  class="btn btn-light">Thay đổi</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">   <form action="admin/ung-vien/{{$value->id}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chọn chứ năng cần thực hiện!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
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

@if(count($errors)>0)
      <div class="alert alert-warning list-inline-item" role="alert"> 
        @foreach($errors->all() as $err)
        {{$err}}<br>
        @endforeach
      </div>
      @endif




@endsection
@section ('script')



 <!-- Page level plugins -->
  <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="admin/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="admin/js/demo/datatables-demo.js"></script>
@endsection