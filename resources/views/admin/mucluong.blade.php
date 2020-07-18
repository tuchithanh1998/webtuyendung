@extends('admin.layout')
@section ('link')
  <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section ('content')
  <div class="container-fluid" >
<div class="row">
  <div class="col-12">
      <div class="card" style="margin-top: 10px; margin-bottom: 10px;" >
        <div class="col-2"><button type="button" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#mucluong">Thêm mức lương</button>

  <div class="modal fade" id="mucluong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              THÔNG TIN MỨC LƯƠNG
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/thong-so/muc-luong/postmucluong" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tenmucluong" class="col-sm-4 col-form-label">Tên mức lương: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tenmucluong" value="" class="form-control" id="tenmucluong" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="mucluong1" class="col-sm-4 col-form-label">Mức lương đầu: *</label>
                            <div class="col-sm-8">
                              <input type="" name="mucluong1" value="" class="form-control" id="mucluong1" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="mucluong2" class="col-sm-4 col-form-label">Mức lương sau: *</label>
                            <div class="col-sm-8">
                              <input type="" name="mucluong2" value="" class="form-control" id="mucluong2" >
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
  </div>
</div></div>
  <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mã</th>
                      <th>Tên mức lương</th>
                      <th>Mức lương đầu</th>
                      <th>Mức lương sau</th>
                      <th>Thao tác             </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Mã</th>
                      <th>Tên mức lương</th>
                      <th>Mức lương đầu</th>
                      <th>Mức lương sau</th>
                      <th>Thao tác             </th>
                    </tr>
                  </tfoot>
                  <tbody>                  
<?php foreach ($data as $key => $value): ?>
                   <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->tenmucluong}}</td>
                      <td>{{$value->mucluong1}}</td>
                      <td>{{$value->mucluong2}}</td>
                      <td><button type="button" id="mucluong" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#mucluong{{$value->id}}">Sửa</button>
                        <div class="modal fade" id="mucluong{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              CHỈNH SỬA THÔNG TIN MỨC LƯƠNG
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/thong-so/muc-luong/postmucluong/{{$value->id}}" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tenmucluong" class="col-sm-4 col-form-label">Tên mức lương: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tenmucluong" value="{{$value->tenmucluong}}" class="form-control" id="tenmucluong" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="mucluong1" class="col-sm-4 col-form-label">Mức lương đầu: *</label>
                            <div class="col-sm-8">
                              <input type="" name="mucluong1" value="{{$value->mucluong1}}" class="form-control" id="mucluong1" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="mucluong2" class="col-sm-4 col-form-label">Mức lương sau: *</label>
                            <div class="col-sm-8">
                              <input type="" name="mucluong2" value="{{$value->mucluong2}}" class="form-control" id="mucluong2" >
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