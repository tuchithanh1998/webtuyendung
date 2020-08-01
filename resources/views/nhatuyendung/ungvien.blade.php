@extends('nhatuyendung.layout')
@section('content')

<form action="nha-tuyen-dung/ung-vien/luu/{{$data->id}}" method="GET"><button class="btn btn-primary"  role="button" style="position: fixed; bottom: 10px; right: 10px; z-index: 1;">Lưu ứng viên</button></form>

<div class="row bg-main">
	<div class="col-12 " style="margin-top: 10px; margin-bottom: 5px;">
		<div class="card">
			<div class="card-header">THÔNG TIN TỔNG QUAN</div>
					<div class="row">
						<div class="col-6">

								<div class="card-body ">
						<span class="font-weight-bold text-success">Email: </span><span><?php echo $data->email; ?></span>
						
					</div>
					<div class="card-body ">
						<span class="font-weight-bold text-success">Số điện thoại: </span><span><?php echo $data->sodienthoai; ?></span>
						
					</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Họ và tên: </span><span><?php echo $data->hoten; ?></span>

							</div>
							
						
							<div class="card-body ">
								<span class="font-weight-bold text-success">Giới tính: </span><span><?php if( $data->gioitinh==1)
								{echo "Nam";}else{echo "Nữ";	}
								?></span>


							</div>
						</div>
						<div class="col-6">
							<div class="card-body ">
								<span class="font-weight-bold text-success">Tình trạng hôn nhân: </span><span><?php if( $data->tinhtranghonnhan==1)
								{echo "Chưa kết hôn";}else{echo "Đã kết hôn";	}
								?></span>

							</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Ngày sinh: </span><span><?php echo date_format(date_create($data->ngaysinh),'d-m-Y'); ?></span>

							</div>
								<div class="card-body ">
								<span class="font-weight-bold text-success">Địa chỉ: </span><span><?php echo $data->diachi; ?></span>

							</div>
							<div class="card-body ">
								<span class="font-weight-bold text-success">Thành phố: </span><span title="<?php echo $data->id_thanhpho; ?>" id="idthanhpho" ><?php echo $data->thanhpho->tenthanhpho; ?></span>

							</div>
						</div>
					</div>
					
					

				

	
		</div>
	</div>
	</div>


<div class="row bg-main">
	<div class="col-12 " style="margin-top: 10px; margin-bottom: 5px;">
		<div class="card">
			<div class="card-header">THÔNG TIN TỔNG QUAN</div>
			<div class="card-body row">
					<div class="col-6">
				
				<p class="card-text"><span class="font-weight-bold">Vị trí mong muốn: </span>{{$data->vitrimongmuon}}</p>
				<p class="card-text"><span class="font-weight-bold">Ngành nghề: </span>{{$data->nganhnghe->tennganhnghe}}</p>
				<p class="card-text"><span class="font-weight-bold">Cấp bậc: </span>{{$data->capbac->tencapbac}}</p>
				<p class="card-text"><span class="font-weight-bold">Hình thức làm việc: </span>{{$data->hinhthuclamviec->tenhinhthuclamviec}}</p>
				<p class="card-text"><span class="font-weight-bold">Kinh nghiệm: </span>{{$data->kinhnghiem->tenkinhnghiem}}</p>
				<p class="card-text"><span class="font-weight-bold">Trình độ: </span>{{$data->trinhdo->tentrinhdo}}</p>			
				<p class="card-text"><span class="font-weight-bold">Mức lương: </span>{{$data->mucluong}}</p>
				<p class="card-text"><span class="font-weight-bold">Thành phố: </span>
					<?php foreach ($data->ungvien_thanhpho as $key => $value): ?>
						{{$value->tenthanhpho}}
					<?php endforeach ?>
				</p>
				<p class="card-text"><span class="font-weight-bold">Kỹ năng: </span>
					<?php foreach ($data->ungvien_kynang as $key => $value): ?>
						{{$value->tenkynang}}
					<?php endforeach ?>
				</p>
			</div>
				<div class="col-6">
				@if($data->anhdaidien!=null)
					<img style="width:400px;height:300px;" src="upload/img/ungvien/anhdaidien/{{$data->anhdaidien}}"/>

					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row bg-main">
	<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
		<div class="card  ">
			<div class="card-header">THÔNG TIN KHÁC</div>
			<div class="card-body">

				<p class="card-text"><span class="font-weight-bold">Mục tiêu: </span>{{$data->muctieu}}</p>
				<p class="card-text"><span class="font-weight-bold">Kỹ năng sở trường: </span>{{$data->kynangsotruong}}</p>
				<p class="card-text"><span class="font-weight-bold">Sở thích: </span>{{$data->sothich}}</p>
				
			</div>
		</div>
	</div>
</div>
<div class="row bg-main">
	<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
		<div class="card  ">
			<div class="card-header">TRÌNH ĐỘ TIN HỌC</div>
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<p class="card-text"><span class="font-weight-bold">MSWORD :</span><?php if($data->trinhdotinhoc[0]->msword==1)
						{echo "Tốt";}elseif ($data->trinhdotinhoc[0]->msword==2) {
							echo "Khá";
						}elseif ($data->trinhdotinhoc[0]->msword==3) {
							echo "Trung bình";
						}else{echo "Kém";}
						?> </p>
						<p class="card-text"><span class="font-weight-bold">MSPP :</span><?php if($data->trinhdotinhoc[0]->mspp==1)
						{echo "Tốt";}elseif ($data->trinhdotinhoc[0]->mspp==2) {
							echo "Khá";
						}elseif ($data->trinhdotinhoc[0]->mspp==3) {
							echo "Trung bình";
						}else{echo "Kém";}
						?> </p>
					</div>
					<div class="col-6">
						<p class="card-text"><span class="font-weight-bold">MSOUTLOOK :</span><?php if($data->trinhdotinhoc[0]->msoutlook==1)
						{echo "Tốt";}elseif ($data->trinhdotinhoc[0]->msoutlook==2) {
							echo "Khá";
						}elseif ($data->trinhdotinhoc[0]->msoutlook==3) {
							echo "Trung bình";
						}else{echo "Kém";}
						?> </p><p class="card-text"><span class="font-weight-bold">MSEXCEL :</span><?php if($data->trinhdotinhoc[0]->msexcel==1)
						{echo "Tốt";}elseif ($data->trinhdotinhoc[0]->msexcel==2) {
							echo "Khá";
						}elseif ($data->trinhdotinhoc[0]->msexcel==3) {
							echo "Trung bình";
						}else{echo "Kém";}
						?> </p>
					</div>			
					<div class="col-12"><p class="card-text"><span class="font-weight-bold">Phần mềm khác :</span>{{$data->trinhdotinhoc[0]->phanmemkhac}}</p>
					</div>
				</div>
				

			</div>
		</div>
	</div>
</div>
<?php foreach ($data->trinhdobangcap as $key => $value): ?>
	<div class="row bg-main">
		<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">


				<div class="card-header">
					<div class="row">


						<div class="col-6">
							Trình độ bằng cấp
						</div>
						<div class="col-6 text-right">
							
						</div>
					</div>
				</div>
				<div class="card-body row">

					<div class="col-4">
						<p class="card-text"><span class="font-weight-bold">Tên bằng cấp:</span> {{$value->tenbangcap}}</p>
						<p class="card-text"><span class="font-weight-bold">Trường đào tạo: </span> {{$value->truongdaotao}}</p>
						<p class="card-text"><span class="font-weight-bold">Chuyên ngành</span> {{$value->chuyennganh}}</p>
						<p class="card-text"><span class="font-weight-bold">Thời gian:</span> <?php $date=date_create($value->thoigiantotnghiep);
						echo date_format($date,"Y-m"); ?>
					</p>
				</div>
				<div class="col-8">	
					<p class="card-text"><span class="font-weight-bold"></span>
@if($value->anh!=null)
					<img style="height:200px; max-width: 500px;" src="upload/img/ungvien/bangcap/{{$value->anh}}"/>

					@else

					  <img style="height: 200px;" src="//placehold.it/200"> 

@endif
					   </p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach ?>

<?php foreach ($data->kinhnghiemlamviec as $key => $value): ?>
	<div class="row bg-main">
		<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-6">
							KINH NGHIỆM LÀM VIỆC<span><small class="text-info" data-toggle="modal" data-target="#kinhnghiemlamviec{{$key}}">...Thay đổi</small></span>
						</div>
						<div class="col-6 text-right"></div>
					</div>
				</div>
				<div class="card-body">
					<p class="card-text"><span class="font-weight-bold">Tên công ty:</span> {{$value->tencongty}}</p>
					<p class="card-text"><span class="font-weight-bold">Chức danh:</span> {{$value->chucdanh}}</p>
					<p class="card-text"><span class="font-weight-bold">Thời gian:</span> <?php $date=date_create($value->thoigianbatdau);
					echo date_format($date,"m/Y");
					?>-<?php 
					if($value->congviechientai==1)
						echo "hiện nay";
					else{
						$date=date_create($value->thoigianbatdau);
						echo date_format($date,"m/Y");
					}?></p>
					<p class="card-text"><span class="font-weight-bold">Mức lương:</span> {{$value->mucluong}} Triệu</p>
					<p class="card-text"><span class="font-weight-bold">Mô tả công việc :</span> {{$value->motacongviec}}</p>
					<p class="card-text"><span class="font-weight-bold">Thành tích:</span> {{$value->thanhtich}}</p>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>

<?php foreach ($data->ungvien_ngoaingu as $key => $value): ?>
	<div class="row bg-main">
		<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">
				<div class="card-header">
					<div class="row">


						<div class="col-6">
							TRÌNH ĐỘ NGOẠI NGỮ
						</div><div class="col-6 text-right">
							
						</div>
					</div>
				</div>
				<div class="card-body">
					<p class="card-text"><span class="font-weight-bold">Ngôn ngữ: </span>

						<?php if($value->id_ngoaingu==20) echo $value->tenngoaingukhac; else{ ?>

							{{$value->ngoaingu->tenngoaingu}}

						<?php }  ?>

					</p>
					<p class="card-text"><span class="font-weight-bold">Trình độ nghe: </span><?php if($value->trinhdonghe==1)
					{echo "Tốt";}elseif ($value->trinhdonghe==2) {
						echo "Khá";
					}elseif ($value->trinhdonghe==3) {
						echo "Trung bình";
					}else{echo "Kém";}
					?> </p>
					<p class="card-text"><span class="font-weight-bold">Trình độ nói: </span><?php if($value->trinhdonoi==1)
					{echo "Tốt";}elseif ($value->trinhdonoi==2) {
						echo "Khá";
					}elseif ($value->trinhdonoi==3) {
						echo "Trung bình";
					}else{echo "Kém";}
					?> </p>
					<p class="card-text"><span class="font-weight-bold">Trình độ đọc: </span><?php if($value->trinhdodoc==1)
					{echo "Tốt";}elseif ($value->trinhdodoc==2) {
						echo "Khá";
					}elseif ($value->trinhdodoc==3) {
						echo "Trung bình";
					}else{echo "Kém";}
					?> </p>
					<p class="card-text"><span class="font-weight-bold">Trình độ viết: </span><?php if($value->trinhdoviet==1)
					{echo "Tốt";}elseif ($value->trinhdoviet==2) {
						echo "Khá";
					}elseif ($value->trinhdoviet==3) {
						echo "Trung bình";
					}else{echo "Kém";}
					?> </p>


				</div>
			</div>
		</div>
	</div>

<?php endforeach ?>
<?php foreach ($data->nguoithamkhao as $key => $value): ?>
	<div class="row bg-main">
		<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">


				<div class="card-header">
					<div class="row">


						<div class="col-6">
							NGƯỜI THAM KHẢO
						</div>
						<div class="col-6 text-right"></div>
					</div>
				</div>
				<div class="card-body">
					<p class="card-text"><span class="font-weight-bold">Họ tên:</span> {{$value->hoten}}</p>
					<p class="card-text"><span class="font-weight-bold">Công ty:</span> {{$value->congty}}</p>

					<p class="card-text"><span class="font-weight-bold">Số điện thoại:</span> {{$value->sodienthoai}}</p>
					<p class="card-text"><span class="font-weight-bold">Chức vụ:</span> {{$value->chucvu}}</p>

				</div>
			</div>
		</div>
	</div>


<?php endforeach ?>
@endsection
@section('script')

@endsection
