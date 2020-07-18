@extends('admin.layout')
@section ('link')
  <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section ('content')
  <div class="container-fluid" >
<div class="row">
  <div class="col-12">
      <div class="card" style="margin-top: 10px; margin-bottom: 10px;" >
        <div class="col-2"><button type="button" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#trinhdo">Thêm trình độ</button>

  <div class="modal fade" id="trinhdo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              THÔNG TIN TRÌNH ĐỘ
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/thong-so/trinh-do/posttrinhdo" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tentrinhdo" class="col-sm-4 col-form-label">Tên trình độ: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tentrinhdo" value="" class="form-control" id="tentrinhdo" >
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
                      <th>Tên trình độ</th>
                      <th>Thao tác             </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Mã</th>
                      <th>Tên trình độ</th>
                      <th>Thao tác             </th>
                    </tr>
                  </tfoot>
                  <tbody>                  
<?php foreach ($data as $key => $value): ?>
                   <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->tentrinhdo}}</td>
                      <td><button type="button" id="trinhdo" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#trinhdo{{$value->id}}">Sửa</button>
                        <div class="modal fade" id="trinhdo{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              CHỈNH SỬA THÔNG TIN TRÌNH ĐỘ
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/thong-so/trinh-do/posttrinhdo/{{$value->id}}" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tentrinhdo" class="col-sm-4 col-form-label">Tên trình độ: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tentrinhdo" value="{{$value->tentrinhdo}}" class="form-control" id="tentrinhdo" >
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