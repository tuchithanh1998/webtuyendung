@extends('admin.layout')
@section ('link')
  <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section ('content')
  <div class="container-fluid" >
<div class="row">
  <div class="col-12">
      <div class="card" style="margin-top: 10px; margin-bottom: 10px;" >
        <div class="col-2"><button type="button" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#thanhpho">Thêm thành phố</button>

  <div class="modal fade" id="thanhpho" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              THÔNG TIN THÀNH PHỐ
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/thong-so/thanh-pho/postthanhpho" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tenthanhpho" class="col-sm-4 col-form-label">Tên thành phố: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tenthanhpho" value="" class="form-control" id="tenthanhpho" >
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
                      <th>Tên thành phố</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Mã</th>
                      <th>Tên thành phố</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </tfoot>
                  <tbody>                  
<?php foreach ($data as $key => $value): ?>
                   <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->tenthanhpho}}</td>
                      <td><?php
                          if ($value->trangthai==1) {
                            echo "Hiện";
                          }
                          else
                            echo "Ẩn";

                       ?></td>
                      <td>      <button type="button" id="thanhpho" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#thanhpho{{$value->id}}">Sửa</button>   
             
            <div class="modal fade" id="thanhpho{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              CHỈNH SỬA THÔNG TIN THÀNH PHỐ
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/thong-so/thanh-pho/postthanhpho/{{$value->id}}" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tenthanhpho" class="col-sm-4 col-form-label">Tên thành phố: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tenthanhpho" value="{{$value->tenthanhpho}}" class="form-control" id="tenthanhpho" >
                            </div>
                          </div>
        <div class="radio">
          <label>
            <input type="radio" name="Radios"  value="1" 
<?php if($value->trangthai==1) echo "checked"; ?>
            >
            Hiện
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="Radios" value="2" <?php if($value->trangthai==2) echo "checked"; ?>>
            Ẩn
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