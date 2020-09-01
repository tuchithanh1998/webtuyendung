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
                      <th>Tiêu đề tuyển dụng</th>
                      <th>Nhà tuyển dụng</th>
                      <th>Thời hạn</th>
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
                       <th>Tiêu đề</th>
                      <th>Nhà tuyển dụng</th>
                      <th>Thời hạn</th>
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
                      <td>{{$value->tieudetuyendung}}</td>
                      <td>{{$value->nhatuyendung->tencongty}}</td>
                      <td>{{$value->hannophoso}}</td>
                      <td><?php
                          if ($value->trangthai==1) {
                            echo "Hiện";
                          }
                          else
                            echo "Ẩn";

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
    <div class="modal-content">   <form action="admin/tin-tuyen-dung/{{$value->id}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: red;">THÔNG TIN TIN TUYỂN DỤNG</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
     <div class="card">
       <div class="card-body row">
          <ul class="list-unstyled col-6">
        <li><h6 style="font-weight: bold;">Tiêu đề tuyển dụng:</h6>  {{$value->tieudetuyendung}}</li>
        <li><h6 style="font-weight: bold;">Số lượng cần tuyển:</h6>  {{$value->soluongcantuyen}}</li>
        <li><h6 style="font-weight: bold;">Giới tính:</h6> {{$value->gioitinh}}</li>
        <li><h6 style="font-weight: bold;">Độ tuổi:</h6> {{$value->dotuoi}}</li>
        <li><h6 style="font-weight: bold;">Mô tả công việc:</h6> <?php echo $value->motacongviec; ?></li>
        <li><h6 style="font-weight: bold;">Quyền lợi:</h6> <?php echo $value->quyenloi; ?></li>
        <li><h6 style="font-weight: bold;">Yêu cầu khác:</h6>  <?php echo $value->yeucaukhac; ?></li>
        <li><h6 style="font-weight: bold;">Hạn nộp hồ sơ:</h6> {{$value->hannophoso}}</li>

        </ul>
       </div>
     </div>

     <h6 class="modal-title" id="exampleModalLabel" style="color: red; text-decoration: underline;">Chọn chức năng!</h6>
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