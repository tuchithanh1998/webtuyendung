@extends('admin.layout')
@section ('link')
  <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section ('content')
  <div class="container-fluid" >
<div class="row">
  <div class="col-12">
      <div class="card" style="margin-top: 10px; margin-bottom: 10px;" >
        <div class="col-2"><button type="button" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#quantri">Thêm quản trị</button>

  <div class="modal fade" id="quantri" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              THÔNG TIN QUẢN TRỊ
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/themquantrivien/them" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tenquantri" class="col-sm-4 col-form-label">Tên quản trị: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tenquantri" value="" class="form-control" id="tenquantri" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email: *</label>
                            <div class="col-sm-8">
                              <input type="" name="email" value="" class="form-control" id="email" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="matkhau" class="col-sm-4 col-form-label">Mật khẩu: *</label>
                            <div class="col-sm-8">
                              <input type="" name="matkhau" value="" class="form-control" id="matkhau" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="sodienthoai" class="col-sm-4 col-form-label">Số điện thoại: *</label>
                            <div class="col-sm-8">
                              <input type="" name="sodienthoai" value="" class="form-control" id="sodienthoai" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="diachi" class="col-sm-4 col-form-label">Địa chỉ: *</label>
                            <div class="col-sm-8">
                              <input type="" name="diachi" value="" class="form-control" id="diachi" >
                            </div>
                          </div>
                          
                      <div class="form-group row"> 
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary w-25">Lưu</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
     

  </div></div>


        </div>
  <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mã</th>
                      <th>Tên quản trị</th>
                      <th>Email</th>
                      <th>SDT</th>
                       <th>Địa chỉ</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Mã</th>
                      <th>Tên quản trị</th>
                      <th>Email</th>
                      <th>SDT</th>
                      <th>Địa chỉ</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </tfoot>
                  <tbody>                  
<?php foreach ($data as $key => $value): ?>
                   <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->ten}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->sodienthoai}}</td>
                      <td>{{$value->diachi}}</td>
                      <td><?php
                          if ($value->trangthai==1) {
                            echo "Hoạt động";
                          }
                          else
                            echo "Khóa";

                       ?></td>
                      <td>      <button type="button" id="thanhpho" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#thanhpho{{$value->id}}">Sửa</button>   
             
            <div class="modal fade" id="thanhpho{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-left">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              CHỈNH SỬA THÔNG TIN
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/themquantrivien/sua/{{$value->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tenquantri" class="col-sm-4 col-form-label">Tên quản trị: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tenquantri" value="{{$value->ten}}" class="form-control" id="tenquantri" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email: *</label>
                            <div class="col-sm-8">
                              <input type="" name="email" value="{{$value->email}}" class="form-control" id="email" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="sodienthoai" class="col-sm-4 col-form-label">Số điện thoại: *</label>
                            <div class="col-sm-8">
                              <input type="" name="sodienthoai" value="{{$value->sodienthoai}}" class="form-control" id="sodienthoai" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="diachi" class="col-sm-4 col-form-label">Địa chỉ: *</label>
                            <div class="col-sm-8">
                              <input type="" name="diachi" value="{{$value->diachi}}" class="form-control" id="diachi" >
                            </div>
                          </div>
                          

        <div class="radio">
          <label>
            <input type="radio" name="Radios"  value="1" 
<?php if($value->trangthai==1) echo "checked"; ?>
            >
            Hoạt động
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="Radios" value="2" <?php if($value->trangthai==2) echo "checked"; ?>>
            Khóa
          </label>
        </div>
                      <div class="form-group row"> 
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary w-25">Lưu</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div></div>
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