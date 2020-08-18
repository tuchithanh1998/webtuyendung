@extends('nhatuyendung.layout')
@section('content')


<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="col-12">

		<div class="card">
			<div class="card-header bg-white">

				<div class="row">
					<div class="col-6 text-left text-info">
						ĐĂNG KÝ TÀI KHOẢN NHÀ TUYỂN DỤNG
					</div>
					<div class="col-6 text-right">
						<sub>
						(*)Thông tin bắt buộc nhập</sub>
					</div>
				</div>




			</div>
			<div class="card-body">
				<form enctype="multipart/form-data"  action="nha-tuyen-dung" method="POST">
					   @csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Email: *</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="email" value="{{ old('email') }}">
						</div>
					</div>

					<div class="form-group row">
						<label for="example-date-input" class="col-4 col-form-label">Mật khẩu: *</label>
						<div class="col-8">
							<input class="form-control" type="password" name="matkhau1" value="{{ old('matkhau1') }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="example-date-input" class="col-4 col-form-label">Nhập lại mật khẩu: *</label>
						<div class="col-8">
							<input class="form-control" type="password" name="matkhau2" value="{{ old('matkhau2') }}" >
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Tên công ty: *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="tencongty" value="{{ old('tencongty') }}">
						</div>
					</div>


					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Địa chỉ công ty: *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="diachicongty" value="{{ old('diachicongty') }}">
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
							<input type="number" class="form-control" name="sodienthoai" value="{{ old('sodienthoai') }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Giới thiệu: *</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="exampleFormControlTextarea1" name="gioithieu"  rows="3">{{ old('gioithieu') }}</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="exampleSelect1" class="col-sm-4 col-form-label">Quy mô nhân sự: *</label>
						<div class="col-sm-8">
							<select class="form-control" id="quymo" name="quymo">

							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Website Công ty: </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="websitecongty" value="{{ old('websitecongty') }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Tên người liên hệ: *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="tennguoilienhe" value="{{ old('tennguoilienhe') }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Đại chỉ liên hệ: *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="diachilienhe" value="{{ old('diachilienhe') }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Số điện thoại liên hệ: *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="sodienthoailienhe" value="{{ old('sodienthoailienhe') }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label">Email liên hệ: *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="emaillienhe"  value="{{ old('emaillienhe') }}">
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
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary w-25">Đăng ký</button>
						</div>
					</div>
				</form>
			</div>
		</div>


	</div>
</div>
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
				
				$('#thanhpho').append(kq);					
			});

		}
	});
	$.ajax({
		type:'GET',
		url:'api/quymonhansu',
		success:function(data){

			var kq='';
			$.each(data,function(k,v){				
				kq= '<option value="'+v.id+'">'+v.quymo+'</option>';
				
				$('#quymo').append(kq);					
			});

		}
	});


});

</script>



@endsection