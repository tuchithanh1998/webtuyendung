 @extends('nhatuyendung.layout')
 @section('content')
 <div class="row">
 	<div class="list-group list-group-flush w-100 bg-danger">
 		<div class="list-group-item w-100 border-0 "><span class="font-weight-bold text-info">THÔNG TIN TÀI KHOẢN </span>
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
 			<span class="font-weight-bold text-info">THÔNG TIN CÔNG TY <a class="text-info" style="font-size: 11px;" data-toggle="modal" data-target="#thongtincongty">...Cập nhật</a></span>
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

 		<div class="modal fade " id="thongtincongty" tabindex="-1" role="dialog" aria-labelledby="Thongtin" aria-hidden="true">
 				<div class="modal-dialog modal-xl">
 					<div class="modal-content"><form enctype="multipart/form-data"  action="nha-tuyen-dung/quan-ly-tai-khoan/thong-tin-cong-ty" method="POST">	
 						 @csrf
 						<div class="modal-header">
 							<h5 class="modal-title" id="Thongtin">Thông tin công ty</h5>
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 								<span aria-hidden="true">&times;</span>
 							</button>
 						</div>
 						<div class="modal-body">
 							
 								<div class="form-group row">
 									<label for="inputEmail3" class="col-sm-4 col-form-label">Tên công ty: *</label>
 									<div class="col-sm-8">
 										<input type="text" class="form-control" value="<?php echo Auth::guard('nhatuyendung')->user()->tencongty; ?>" name="tencongty">
 									</div>
 								</div>


 								<div class="form-group row">
 									<label for="inputEmail3" class="col-sm-4 col-form-label">Địa chỉ công ty: *</label>
 									<div class="col-sm-8">
 										<input type="text" class="form-control" value="<?php echo Auth::guard('nhatuyendung')->user()->diachicongty; ?>" name="diachicongty">
 									</div>
 								</div>

 								<div class="form-group row">
 									<label for="exampleSelect1" class="col-sm-4 col-form-label">Tỉnh/thành phố: *</label>
 									<div class="col-sm-8">
 										<select class="form-control" id="thanhpho" name="thanhpho">
 										
 										</select>
 									</div>
 								</div>

 								<div class="form-group row">
 									<label for="inputEmail3" class="col-sm-4 col-form-label">Số điện thoại: *</label>
 									<div class="col-sm-8">
 										<input type="number" class="form-control" value="<?php echo Auth::guard('nhatuyendung')->user()->sodienthoai; ?>" name="sodienthoai">
 									</div>
 								</div>
 								<div class="form-group row">
 									<label for="inputEmail3" class="col-sm-4 col-form-label">Giới thiệu: *</label>
 									<div class="col-sm-8">
 										<textarea class="form-control" id="exampleFormControlTextarea1" name="gioithieu" rows="3"><?php echo Auth::guard('nhatuyendung')->user()->gioithieu; ?></textarea>
 									</div>
 								</div>
 								<div class="form-group row">
 									<label for="exampleSelect1" class="col-sm-4 col-form-label">Quy mô nhân sự: *</label>
 									<div class="col-sm-8">
 										<select class="form-control" id="quymo" name="quymo">
 											<?php foreach (App\quymonhansu::all() as $key => $value): ?>
 												<option <?php if($value->id== Auth::guard('nhatuyendung')->user()->id_quymonhansu) echo "selected"; ?> value="{{$value->id}}">{{$value->quymo}}</option>
 											<?php endforeach ?>
 										</select>
 									</div>
 								</div>
 								<div class="form-group row">
 									<label for="inputEmail3" class="col-sm-4 col-form-label">Website Công ty: </label>
 									<div class="col-sm-8">
 										<input type="text" class="form-control" value="<?php echo Auth::guard('nhatuyendung')->user()->websitecongty; ?>" name="websitecongty">
 									</div>
 								</div>
 								<div class="form-group row">
 									<label for="anh" class="col-sm-4 col-form-label">Ảnh: </label>
 									<div class="col-sm-8">
 										<div class="custom-file">
 											<input  type="file" name="filesTest" onchange="return fileValidation()" class="custom-file-input" id="inputGroupFile" aria-describedby="inputGroupFileAddon">
 											<label class="custom-file-label"  for="inputGroupFile">Chọn ảnh</label>
 										</div>
 									</div>
 								</div>

 							
 							<div  id="imagePreview"></div>
 						</div>
 						<div class="modal-footer">
 							<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
 							<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
 						</div>
 					</form></div>
 				</div>
 			</div>


 			<div class="list-group-item w-100 border-0">
 				<span class="font-weight-bold text-info">THÔNG TIN NGƯỜI LIÊN HỆ <a class="text-info" style="font-size: 11px;" data-toggle="modal" data-target="#thongtinnguoilienhe">...Cập nhật</a></span>
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

 		<div class="modal fade" id="thongtinnguoilienhe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content"><form  action="nha-tuyen-dung/quan-ly-tai-khoan/thong-tin-nguoi-lien-he" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Tên người liên hệ: *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo Auth::guard('nhatuyendung')->user()->tennguoilienhe; ?>" name="tennguoilienhe">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Đại chỉ liên hệ: *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo Auth::guard('nhatuyendung')->user()->diachilienhe; ?>" name="diachilienhe">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Số điện thoại liên hệ: *</label>
						<div class="col-sm-8">
							<input type="text" value="<?php echo Auth::guard('nhatuyendung')->user()->sodienthoailienhe; ?>" class="form-control" name="sodienthoailienhe">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Email liên hệ: *</label>
						<div class="col-sm-8">
							<input type="text" value="<?php echo Auth::guard('nhatuyendung')->user()->emaillienhe; ?>" class="form-control" name="emaillienhe">
						</div>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
      </div>
    </form></div>
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
 @endsection


 @section('script')

 <script type="text/javascript">
 	function fileValidation(){
 		var fileInput = document.getElementById('inputGroupFile');
var filePath = fileInput.value;//lấy giá trị input theo id
var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
//Kiểm tra định dạng
if(!allowedExtensions.exec(filePath)){
	alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
	fileInput.value ='';
	return false;
}else{
//Image preview
if (fileInput.files && fileInput.files[0]) {
	var reader = new FileReader();
	reader.onload = function(e) {
		document.getElementById('imagePreview').innerHTML = '<img style="width:400px;height:300px;" src="'+e.target.result+'"/>';
	};
	reader.readAsDataURL(fileInput.files[0]);
}
}
}


$(document).ready(function(){


	$.ajax({
		type:'GET',
		url:'api/thanhpho',
		success:function(data){

			var kq='';
			$.each(data,function(k,v){				
				kq= '<option value="'+v.id+'">'+v.tenthanhpho+'</option>';
				if(v.id=={{Auth::guard('nhatuyendung')->user()->id_thanhpho}})
					kq= '<option selected value="'+v.id+'">'+v.tenthanhpho+'</option>';
					$('#thanhpho').append(kq);					
			});
			localStorage.clear();

		}
	});


});

</script>
@endsection