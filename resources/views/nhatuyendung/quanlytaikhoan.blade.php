 @extends('nhatuyendung.layout')
@section('content')
<div class="row">
	<div class="list-group list-group-flush w-100 bg-danger">
<div class="list-group-item w-100 border-0">THÔNG TIN TÀI KHOẢN </span>
	<div class="card text-left " >
				<div class="row">
					<div class="col-12">
						<div class="card-body ">
							<span class="font-weight-bold text-success">Email: </span><span><?php echo Auth::guard('nhatuyendung')->user()->email; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Mật khẩu: </span><span>********</span> <a class="text-info" style="font-size: 11px;" data-toggle="modal" data-target="#doimatkhau">Đổi mật khẩu</a></span>
						</div>
					</div>
					
				</div>
			</div>
</div>


		<div class="list-group-item w-100 border-0">
			<span class="font-weight-bold text-info">THÔNG TIN CÔNG TY <a class="text-info" style="font-size: 11px;" href="">...Cập nhật</a></span>
			<div class="card text-left " >
				<div class="row">
					<div class="col-6">
						<div class="card-body ">
							<span class="font-weight-bold text-success"> </span><span><?php if((Auth::guard('nhatuyendung')->user()->logo)!=null)
							{	?>
								<img src="upload/img/nhatuyendung/logo/{{Auth::guard('nhatuyendung')->user()->logo}}" class="img-fluid" style="width: 200px; height: 200px;" alt="">
							<?php }else{
								?>
								<img src="//placehold.it/120" style="width: 200px; height: 200px;" class="img-fluid" alt="">
								<?php
							} ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Công ty: </span><span><?php echo Auth::guard('nhatuyendung')->user()->tencongty; ?></span>
						</div>
					</div>
					<div class="col-6">
						<div class="card-body ">
							<span class="font-weight-bold text-success">Địa chỉ: </span><span><?php echo Auth::guard('nhatuyendung')->user()->diachicongty; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Thành phố: </span><span><?php echo Auth::guard('nhatuyendung')->user()->thanhpho->tenthanhpho; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Quy mô: </span><span><?php echo Auth::guard('nhatuyendung')->user()->quymonhansu->quymo; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Website: </span><span><?php echo Auth::guard('nhatuyendung')->user()->websitecongty; ?></span>
						</div>
						<div class="card-body ">
							<span class="font-weight-bold text-success">Số điện thoại: </span><span><?php echo Auth::guard('nhatuyendung')->user()->sodienthoai; ?></span>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-12">
				  	
				<div class="card-body ">
							<span class="font-weight-bold text-success">Giới thiệu: </span><span><?php echo Auth::guard('nhatuyendung')->user()->gioithieu; ?></span>
						</div></div>
				
			</div>

			</div>
		</div>
		<div class="list-group-item w-100 border-0">
			<span class="font-weight-bold text-info">THÔNG TIN NGƯỜI LIÊN HỆ <a class="text-info" style="font-size: 11px;" href="">...Cập nhật</a></span>
			<div class="card text-left " >
				<div class="row">
					<div class="col-6">	<div class="card-body ">
						<span class="font-weight-bold text-success">Người đại điện: </span><span><?php echo Auth::guard('nhatuyendung')->user()->tennguoilienhe; ?></span>

					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Địa chỉ: </span><span><?php echo Auth::guard('nhatuyendung')->user()->diachilienhe; ?></span>
					</div>
				</div>
				<div class="col-6">				
					<div class="card-body ">
						<span class="font-weight-bold text-success">Email: </span><span><?php echo Auth::guard('nhatuyendung')->user()->emaillienhe; ?></span>
					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Số điện thoại: </span><span><?php echo Auth::guard('nhatuyendung')->user()->sodienthoailienhe; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="doimatkhau" tabindex="-1" role="dialog" aria-labelledby="doimatkhauModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="doimatkhauModalLabel">ĐỔI MẬT KHẨU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      	<form action="nha-tuyen-dung/quan-ly-tai-khoan/doi-mat-khau" method="POST">
      		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Nhập mật khẩu:</label>
    <div class="col-sm-8">
      <input type="password"  name="oldpassword" class="form-control" id="inputPassword">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword1" class="col-sm-4 col-form-label">Mật khẩu mới:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" name="newpassword1" id="inputPassword1">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword2" class="col-sm-4 col-form-label">Nhập lại mật khẩu:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control"  name="newpassword2" id="inputPassword2">
    </div>
  </div><div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
      </div>
</form>
</div>
      
    </div>
  </div>
</div>

@endsection


@section('script')
@endsection