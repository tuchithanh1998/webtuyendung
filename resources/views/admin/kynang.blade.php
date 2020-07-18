@extends('admin.layout')
@section ('link')
  <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section ('content')
  <div class="container-fluid" >
<div class="row">
  <div class="col-12">
      <div class="card" style="margin-top: 10px; margin-bottom: 10px;" >
        <div class="col-2"><button type="button" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#kynang">Thêm kỹ năng</button>

  <div class="modal fade" id="kynang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              THÔNG TIN KỸ NĂNG
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/thong-so/ky-nang/postkynang" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tenkynang" class="col-sm-4 col-form-label">Tên kỹ năng: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tenkynang" value="" class="form-control" id="tenkynang" >
                            </div>
                          </div>
                          <div class="form-group row">
                                <label for="tennganhnghe" class="col-sm-4 col-form-label">Ngành nghề: *</label>
                                <div class="col-sm-8">
                                  <select class="form-control w-100" id="nganhnghe" name="nganhnghe">
                <option selected value="">Ngành nghề</option>    
                    <?php foreach (App\nganhnghe::all() as $key => $value): ?>
                                             <option  value="{{$value->id}}"> {{$value->tennganhnghe}}
                                             </option>
                                          <?php endforeach ?>         
              </select>
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
                      <th>Tên kỹ năng</th>
                      <th>Tên ngành nghề</th>
                      <th>Thao tác             </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Mã</th>
                      <th>Tên kỹ năng</th>
                      <th>Tên ngành nghề</th>
                      <th>Thao tác             </th>
                    </tr>
                  </tfoot>
                  <tbody>                  
<?php foreach ($data as $key => $value): ?>
                   <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->tenkynang}}</td>
                      <td>{{$value->nganhnghe->tennganhnghe}}</td>
                      <td><button type="button" id="kynang" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#kynang{{$value->id}}">Sửa</button>
                        <div class="modal fade" id="kynang{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-sm-12  text-center">
                      <div class="card">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-6 text-left text-info">
                              CHỈNH SỬA THÔNG TIN KỸ NĂNG
                            </div>
                            <div class="col-6 text-right">
                              (*)Thông tin bắt buộc nhập
                            </div>
                          </div>
                        </div>
                        <div class="card-body"><form action="admin/thong-so/ky-nang/postkynang/{{$value->id}}" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group row">
                            <label for="tenkynang" class="col-sm-4 col-form-label">Tên kỹ năng: *</label>
                            <div class="col-sm-8">
                              <input type="" name="tenkynang" value="{{$value->tenkynang}}" class="form-control" id="tenkynang" >
                            </div>
                          </div>
                          <div class="form-group row">
                                <label for="tennganhnghe" class="col-sm-4 col-form-label">Ngành nghề: *</label>
                                <div class="col-sm-8">
                                  <select class="form-control w-100" id="nganhnghe" name="nganhnghe">
                <option selected value="">Ngành nghề</option>    
                    <?php foreach (App\nganhnghe::all() as $key1 => $value1): ?>
                                             <option  value="{{$value1->id}}" <?php 


                                              if($value1->id==$value->id_nganhnghe)
echo "selected";

                                             ?> > {{$value1->tennganhnghe}}
                                             </option>
                                          <?php endforeach ?>         
              </select>
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