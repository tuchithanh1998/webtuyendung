@extends('ungvien.layout')
@section('content')



<div class="row bg-white">
	<div class=" text-left w-100 col-12" >
		<div class="list-group list-group-flush w-100 bg-danger">
			<div class="list-group-item w-100 border-0">
				<span class="font-weight-bold text-info">THÔNG TIN TÀI KHOẢN</span>
				<div class="card text-left" >

					<div class="card-body ">
						<span class="font-weight-bold text-success">Email: </span><span><?php echo Auth::guard('ungvien')->user()->email; ?></span>
						
					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Số điện thoại: </span><span><?php echo Auth::guard('ungvien')->user()->sodienthoai; ?></span>
						<span><small data-toggle="modal" data-target="#sodienthoai" >Đổi Số điện thoại</small></span>


<div class="modal fade" id="sodienthoai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="row">
											<div class="col-sm-12  text-center">
												<div class="card">

													<div class="card-body">
														<form  action="ungvien/quanlytaikhoan/postthongtincanhan/sodienthoai" method="POST">



															<div class="form-group row">
															<input type="hidden" name="_token" value="{{csrf_token()}}"/>

											
															<label for="sodienthoai" class="col-sm-4 col-form-label">Số điện thoại: *</label>
															<div class="col-sm-8">
																<input type="number" name="sodienthoai" value="<?php echo Auth::guard('ungvien')->user()->sodienthoai; ?>" class="form-control" id="sodienthoai" >
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
							</div>

					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Mật khẩu: </span><span>*******</span>
						<span><small data-toggle="modal" data-target="#doimatkhau" >Đổi Mật Khẩu</small></span>
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
      	<form action="ung-vien/quan-ly-tai-khoan/doi-mat-khau" method="POST">
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
					</div>
				</div>
			</div>
			<div class="list-group-item w-100 border-0">
				<span class="font-weight-bold text-info">THÔNG TIN CÁ NHÂN</span>
				<div class="card text-left " >
					<div class="row">
						<div class="col-6">
							<div class="card-body ">
								<span class="font-weight-bold text-success">Họ và tên: </span><span><?php echo Auth::guard('ungvien')->user()->hoten; ?></span>

							</div>
							
							<div class="card-body ">
								<span class="font-weight-bold text-success">Địa chỉ: </span><span><?php echo Auth::guard('ungvien')->user()->diachi; ?></span>

							</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Giới tính: </span><span><?php if(Auth::guard('ungvien')->user()->gioitinh!=""){ if( Auth::guard('ungvien')->user()->gioitinh==1)
								{echo "Nam";}else{echo "Nữ";	}}
								?></span>


							</div>
						</div>
						<div class="col-6">
							<div class="card-body ">
								<span class="font-weight-bold text-success">Tình trạng hôn nhân: </span><span><?php if(Auth::guard('ungvien')->user()->tinhtranghonnhan!=""){if( Auth::guard('ungvien')->user()->tinhtranghonnhan==1)
								{echo "Chưa kết hôn";}else{echo "Đã kết hôn";	}}
								?></span>

							</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Ngày sinh: </span><span><?php if(Auth::guard('ungvien')->user()->ngaysinh!="") echo date_format(date_create(Auth::guard('ungvien')->user()->ngaysinh),'d-m-Y'); ?></span>

							</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Thành phố: </span><span title="<?php echo Auth::guard('ungvien')->user()->id_thanhpho; ?>" id="idthanhpho" >

									<?php if(Auth::guard('ungvien')->user()->id_thanhpho) echo Auth::guard('ungvien')->user()->thanhpho->tenthanhpho; ?></span>

								</div>
							</div>
						</div>



						<div class="card-body ">
							<div class="list-inline">	<button type="button" id="thongtincanhan" class="btn btn-primary list-inline-item" data-toggle="modal" data-target=".bd-example-modal-lg">CẬP NHẬT THÔNG TIN CÁ NHÂN</button>

								<button type="button" id="thongtincanhan" class="btn btn-primary list-inline-item" data-toggle="modal" data-target="#anhdaidien">CẬP NHẬT ẢNH ĐẠI DIỆN</button>
								@if(count($errors)>0)
								<div class="alert alert-warning alert-dismissible fade show fixed-top w-25" style="margin-top: 10%; margin-left:75%;" role="alert">
									<strong>@foreach($errors->all() as $err)
										{{$err}}<br>
									@endforeach</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>




								@endif
							</div>





							<div class="modal fade" id="anhdaidien" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="row">
											<div class="col-sm-12  text-center">
												<div class="card">

													<div class="card-body">
														<form enctype="multipart/form-data" action="ungvien/quanlytaikhoan/postthongtincanhan/anh" method="POST">
															<input type="hidden" name="_token" value="{{csrf_token()}}"/>

															<div class="input-group">
																<div class="custom-file">
																	<input  type="file" name="filesTest" required="true" onchange="return fileValidation()" class="custom-file-input" id="inputGroupFile" aria-describedby="inputGroupFileAddon">
																	<label class="custom-file-label"  for="inputGroupFile">Chọn ảnh đại diện</label>
																</div>
																<div class="input-group-append">
																	<button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon">Xác nhận</button>
																</div>
															</div>



														</form>
														     <div  id="imagePreview"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>







							<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="row">
											<div class="col-sm-12  text-center">
												<div class="card">
													<div class="card-header bg-white">

														<div class="row">
															<div class="col-6 text-left text-info">
																CHỈNH SỬA THÔNG TIN CÁ NHÂN
															</div>
															<div class="col-6 text-right">
																(*)Thông tin bắt buộc nhập
															</div>
														</div>




													</div>
													<div class="card-body"><form action="ungvien/quanlytaikhoan/postThongtincanhan" method="POST">
														<input type="hidden" name="_token" value="{{csrf_token()}}"/>
														<div class="form-group row">
															<label for="hoten" class="col-sm-4 col-form-label">Họ tên: *</label>
															<div class="col-sm-8">
																<input type="" name="hoten" value="<?php echo Auth::guard('ungvien')->user()->hoten; ?>" class="form-control" id="hoten" >
															</div>
														</div>

														<div class="form-group row">
															<label for="example-date-input" class="col-4 col-form-label">Ngày sinh: *</label>
															<div class="col-8">
																<input class="form-control" type="date" name="ngaysinh" value="<?php echo Auth::guard('ungvien')->user()->ngaysinh; ?>" id="example-date-input">
															</div>
														</div>

														<fieldset class="form-group ">
															<div class="row">
																<legend class="col-form-label col-sm-4 pt-0">Giới tính: *</legend>
																<div class="col-sm-8 text-left"><div class="form-check form-check-inline">
																	<input class="form-check-input"<?php if( Auth::guard('ungvien')->user()->gioitinh==1) echo "checked"; ?> type="radio" name="gioitinh" id="gioitinhnam" value="1" >
																	<label class="form-check-label"    for="inlineRadio1">Nam</label>
																</div>
																<div class="form-check form-check-inline">
																	<input class="form-check-input" type="radio"<?php if( Auth::guard('ungvien')->user()->gioitinh==2) echo "checked"; ?> name="gioitinh" id="gioitinhnu" value="2" >
																	<label class="form-check-label" for="inlineRadio2">Nữ </label>
																</div>
															</div>
														</div>
													</fieldset>
													<fieldset class="form-group ">
														<div class="row">
															<legend class="col-form-label col-sm-4 pt-0">Tình trạng hôn nhân: *</legend>
															<div class="col-sm-8 text-left"><div class="form-check form-check-inline">
																<input class="form-check-input" <?php if( Auth::guard('ungvien')->user()->tinhtranghonnhan==1) echo "checked"; ?> type="radio" name="tinhtranghonnhan" id="tinhtranghonnhandocthan" value="1" >
																<label class="form-check-label" for="inlineRadio1">Độc thân</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" <?php if( Auth::guard('ungvien')->user()->tinhtranghonnhan==2) echo "checked"; ?> type="radio" name="tinhtranghonnhan" id="tinhtranghonnhandakethon" value="2">
																<label class="form-check-label" for="inlineRadio2">Đã có gia đình</label>
															</div>
														</div>
													</div>
												</fieldset>
												<div class="form-group row">
													<label for="inputEmail3" class="col-sm-4 col-form-label">Địa chỉ hiện tại: *</label>
													<div class="col-sm-8">
														<input type="input" class="form-control" id="inputEmail3" name="diachi" value="<?php echo Auth::guard('ungvien')->user()->diachi; ?>">
													</div>
												</div>


												<div class="form-group row" >
													<label for="exampleSelect1" class="col-sm-4 col-form-label">Tỉnh/thành phố: *</label>
													<div class="col-sm-8">
														<select  class="form-control" id="thanhpho" name="thanhpho">

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
				</div>
			</div>

		</div>
	</div>

</div>
</div>
</div>

@endsection
@section('script')

<script type="text/javascript">
	$(document).ready(function(){

		$('#thongtincanhan').click(function(){
			$.ajax({

				type:'GET',
				url:'api/thanhpho',
				success:function(data){

					var kq='';
					$.each(data,function(k,v){				
						kq= '<option  value="'+v.id+'">'+v.tenthanhpho+'</option>';
						if($('#idthanhpho')[0].title==v.id)
							kq= '<option selected value="'+v.id+'">'+v.tenthanhpho+'</option>';
						$('#thanhpho').append(kq);					
					});

				}
			});


		});
	});


	function fileValidation(){
		var fileInput = document.getElementById('inputGroupFile');
var filePath = fileInput.value;//lấy giá trị input theo id
var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
//Kiểm tra định dạng
if(!allowedExtensions.exec(filePath)){
	alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
	fileInput.value = '';
	return false;
}else{
//Image preview
if (fileInput.files && fileInput.files[0]) {
	var reader = new FileReader();
	reader.onload = function(e) {
		document.getElementById('imagePreview').innerHTML = '<img style="width:700px;height:400px;" src="'+e.target.result+'"/>';
	};
	reader.readAsDataURL(fileInput.files[0]);
}
}
}
</script>
@endsection
