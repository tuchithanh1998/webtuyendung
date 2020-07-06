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
                   
                    <tr>
                      <td>Donna Snider</td>
                      <td>Customer Support</td>
                      <td>New York</td>
                      <td>27</td>
                      <td>2011/01/25</td>
                      <td>Mở</td>
                      <td><button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn btn-light">Thay đổi</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
</div>
  </div>
</div>

</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">   <form action="s">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chọn chứ năng cần thực hiện!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <div class="radio">
          <label>
            <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            Mở
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
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




@endsection
@section ('script')



 <!-- Page level plugins -->
  <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="admin/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="admin/js/demo/datatables-demo.js"></script>
@endsection