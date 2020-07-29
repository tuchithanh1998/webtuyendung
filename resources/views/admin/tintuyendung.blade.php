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
                      <th>Tiêu đề</th>
                      <th>Số lượng cần tuyển</th>
                      <th>Nhà tuyển dụng</th>
                      <th>Hồ sơ ứng tuyển</th>
                      <th>Thời hạn</th>
                         <th>Trạng thái</th>
                      <th>             </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>Tiêu đề</th>
                      <th>Số lượng cần tuyển</th>
                      <th>Nhà tuyển dụng</th>
                      <th>Hồ sơ ứng tuyển</th>
                      <th>Thời hạn</th>
                         <th>Trạng thái</th>
                      <th>             </th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($data as $key => $value): ?>
                  <tr>
                      <td>{{$value->tieudetuyendung}}</td>
                      <td>{{$value->soluongcantuyen}}</td>
                      <td>{{$value->nhatuyendung->tencongty}}</td>
                      <td>{{$value->gioitinh}}</td>
                      <td>{{$value->hannophoso}}</td>
                      <td><?php
                          if ($value->trangthai==1) {
                            echo "Hiện";
                          }
                          else
                            echo "Ẩn";

                       ?></td>
                      <td><button type="button" data-toggle="modal" data-target="#exampleModal{{$key}}"  class="btn btn-light">Thay đổi</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">   <form action="admin/tin-tuyen-dung/{{$value->id}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"/>
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