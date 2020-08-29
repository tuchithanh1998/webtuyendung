@extends('ungvien.layout')
@section('content')


<div class="row bg-main">
	<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
		<div class="card  ">
			<div class="card-header">THÔNG TIN HỒ SƠ<span><small class="text-info" data-toggle="modal" data-target="#thaydoihoso">...Cập nhật</small></span></div>
			<div class="card-body">
				<p class="card-text"><span class="font-weight-bold">Vị trí mong muốn: </span>{{$data->vitrimongmuon}}</p>
				<p class="card-text"><span class="font-weight-bold">Mức lương mong muốn: </span>{{number_format($data->mucluongmongmuon)}} vnđ</p>
				<p class="card-text"><span class="font-weight-bold">Ngành nghề: </span><?php 

				if($data->id_nganhnghe!="")
					echo $data->nganhnghe->tennganhnghe;
				?>


			</p>
			<p class="card-text"><span class="font-weight-bold">Cấp bậc: </span>
				<?php 

				if($data->id_capbac!="")
					echo $data->capbac->tencapbac;
				?>
			</p>
			<p class="card-text"><span class="font-weight-bold">Hình thức làm việc: </span><?php 

			if($data->id_hinhthuclamviec!="")
				echo $data->hinhthuclamviec->tenhinhthuclamviec;
			?>
		</p>
		<p class="card-text"><span class="font-weight-bold">Kinh nghiệm: </span><?php 

		if($data->id_kinhnghiem!="")
			echo $data->kinhnghiem->tenkinhnghiem;
		?>
	</p>
	<p class="card-text"><span class="font-weight-bold">Trình độ: </span>
		<?php 

		if($data->id_trinhdo!="")
			echo $data->trinhdo->tentrinhdo;
		?>
	</p>			
	
	<p class="card-text"><span class="font-weight-bold">Thành phố: </span>
		<?php foreach ($data->ungvien_thanhpho as $key => $value): if($key!=0) echo " , ";?>
			{{$value->tenthanhpho}}
		<?php endforeach ?>
	</p>
	<p class="card-text"><span class="font-weight-bold">Kỹ năng: </span>
		<?php foreach ($data->ungvien_kynang as $key => $value): if($key!=0) echo " , "  ?>
			{{$value->tenkynang}}
		<?php endforeach ?>
	</p>

	<p class="card-text"><span class="font-weight-bold">Tìm kiếm và nhận Mail:</span>
		<?php 

		if($data->timkiem==1)
			echo " Có.";
		else
			echo "Không.";
		?>
	</p>
</div>
</div>
</div>
</div>

<div class="row bg-main">
	<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
		<div class="card  ">
			<div class="card-header">TRÌNH ĐỘ TIN HỌC<span><small class="text-info" data-toggle="modal" data-target="#trinhdotinhoc">...Cập nhật</small></span></div>
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<p class="card-text"><span class="font-weight-bold">MSWORD :</span><?php 
						if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword!="")	{	if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==1)
							{echo "Tốt";}
						elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==2) {
							echo "Khá";
						}elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==3) {
							echo "Trung bình";
						}else{echo "Kém";}}
						?> </p>
						<p class="card-text"><span class="font-weight-bold">MSPP :</span><?php 
						if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp!="")	{			if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==1)
							{echo "Tốt";}elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==2) {
								echo "Khá";
							}elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==3) {
								echo "Trung bình";
							}else{echo "Kém";}}
							?> </p>
						</div>
						<div class="col-6">
							<p class="card-text"><span class="font-weight-bold">MSOUTLOOK :</span>
								<?php if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook!="")
								{
									if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==1)
									{
										echo "Tốt";
									}
									elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==2) {
										echo "Khá";
									}
									elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==3) {
										echo "Trung bình";
									}
									else
										{echo "Kém";}
								}
								?> </p><p class="card-text"><span class="font-weight-bold">MSEXCEL :</span>
									<?php 
									if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel!="")	
									{	
										if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==1)
										{
											echo "Tốt";
										}
										elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==2) 
										{
											echo "Khá";
										}
										elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==3) {
											echo "Trung bình";
										}
										else
										{
											echo "Kém";
										}
									}
									?> </p>
								</div>
								

								
								<div class="col-12"><p class="card-text"><span class="font-weight-bold">Phần mềm khác :</span>
									<?php echo  Auth::guard('ungvien')->user()->trinhdotinhoc[0]->phanmemkhac; ?>
								</p>
								</div>
							</div>
							

						</div>
					</div>
				</div>
			</div>

			<div class="modal fade bd-example-modal-lg" id="trinhdotinhoc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="card">
									<div class="card-header bg-white">

										<div class="row">
											<div class="col-6 text-left text-info">
												THAY ĐỔI
											</div>
											<div class="col-6 text-right">

												<sub>	(*)Thông tin bắt buộc nhập</sub>
											</div>
										</div>
									</div>
									<div class="card-body">
										<form action="ung-vien/ho-so/trinh-do-tin-hoc" method="POST">
											<input type="hidden" name="_token" value="{{csrf_token()}}"/>

											<div class="form-group row">
												<label for="phanmemkhac" class="col-sm-4 col-form-label">Phần mềm khác: *</label>
												<div class="col-sm-8">
													<textarea type="text" rows="2" class="form-control" value="" id="phanmemkhac" name="phanmemkhac">
<?php

 $text = Auth::guard('ungvien')->user()->trinhdotinhoc[0]->phanmemkhac;
    $breaks = array("<br />","<br>","<br/>");  
    $text = str_ireplace($breaks, "", $text); 


													 echo  $text; ?>
													</textarea>
												</div>
											</div>


											<div class="form-group row">
												<label  class="col-sm-4 col-form-label">MSWORD: *</label>
												<div class="col-sm-8 list-inline">
													<div class="radio list-inline-item">
														<label>
															<input type="radio" name="msword"  value="1" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==1) echo "checked";?>  >
															Tốt
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msword" value="2" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==2) echo "checked";?>>
															Khá
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msword"  value="3" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==3) echo "checked";?>>
															Trung bình
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msword"value="4" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==4) echo "checked";?>>
															Kém
														</label>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label  class="col-sm-4 col-form-label">MSPP: *</label>
												<div class="col-sm-8 list-inline">
													<div class="radio list-inline-item">
														<label>
															<input type="radio" name="mspp"  value="1" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==1) echo "checked";?>  >
															Tốt
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="mspp" value="2" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==2) echo "checked";?>>
															Khá
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="mspp"  value="3" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==3) echo "checked";?>>
															Trung bình
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="mspp"value="4" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==4) echo "checked";?>>
															Kém
														</label>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label  class="col-sm-4 col-form-label">MSOUTLOOK: *</label>
												<div class="col-sm-8 list-inline">
													<div class="radio list-inline-item">
														<label>
															<input type="radio" name="msoutlook"  value="1" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==1) echo "checked";?>  >
															Tốt
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msoutlook" value="2" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==2) echo "checked";?>>
															Khá
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msoutlook"  value="3" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==3) echo "checked";?>>
															Trung bình
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msoutlook"value="4" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==4) echo "checked";?>>
															Kém
														</label>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label  class="col-sm-4 col-form-label">MSEXCEL: *</label>
												<div class="col-sm-8 list-inline">
													<div class="radio list-inline-item">
														<label>
															<input type="radio" name="msexcel"  value="1" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==1) echo "checked";?>  >
															Tốt
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msexcel" value="2" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==2) echo "checked";?>>
															Khá
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msexcel"  value="3" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==3) echo "checked";?>>
															Trung bình
														</label>
													</div>
													<div class="radio  list-inline-item">
														<label>
															<input type="radio" name="msexcel"value="4" <?php  if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==4) echo "checked";?>>
															Kém
														</label>
													</div>
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



			<div class="row bg-main">
				<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
					<div class="card  ">
						<div class="card-header">KỸ NĂNG KHÁC<span><small class="text-info" data-toggle="modal" data-target="#thaydoihososothich">... Cập nhật</small></span></div>
						<div class="card-body">

							<p class="card-text"><span class="font-weight-bold">Mục tiêu: </span><?php echo  Auth::guard('ungvien')->user()->muctieu; ?></p>
							<p class="card-text"><span class="font-weight-bold">Sở trường: </span><?php echo  Auth::guard('ungvien')->user()->kynangsotruong; ?></p>
							<p class="card-text"><span class="font-weight-bold">Sở thích: </span><?php echo  Auth::guard('ungvien')->user()->sothich; ?></p>
							
						</div>
					</div>
				</div>
			</div>


			<div class="modal fade bd-example-modal-lg" id="thaydoihososothich" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="card">
									<div class="card-header bg-white">

										<div class="row">
											<div class="col-6 text-left text-info">
												THAY ĐỔI
											</div>
											<div class="col-6 text-right">

												<sub>	(*)Thông tin bắt buộc nhập</sub>
											</div>
										</div>
									</div>
									<div class="card-body">
										<form action="ung-vien/khac" method="POST">
											<input type="hidden" name="_token" value="{{csrf_token()}}"/>
											<div class="form-group row">
												<label for="muctieu" class="col-sm-4 col-form-label">Mục tiêu: *</label>
												<div class="col-sm-8">
													<textarea type="text" rows="2" class="form-control" value="" name="muctieu"><?php

 $text = Auth::guard('ungvien')->user()->muctieu;
    $breaks = array("<br />","<br>","<br/>");  
    $text = str_ireplace($breaks, "", $text); 


													 echo  $text; ?></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label for="kynangsotruong" class="col-sm-4 col-form-label">Kỹ năng sở trường: *</label>
												<div class="col-sm-8">
													<textarea type="text" rows="2" class="form-control" value="" id="kynangsotruong" name="kynangsotruong"><?php

 $text = Auth::guard('ungvien')->user()->kynangsotruong;
    $breaks = array("<br />","<br>","<br/>");  
    $text = str_ireplace($breaks, "", $text); 


													 echo  $text; ?></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label for="sothich" class="col-sm-4 col-form-label">Sở thích: *</label>
												<div class="col-sm-8">
													<textarea type="text" rows="2" class="form-control" value="" id="sothich" name="sothich"><?php

 $text = Auth::guard('ungvien')->user()->sothich;
    $breaks = array("<br />","<br>","<br/>");  
    $text = str_ireplace($breaks, "", $text); 


													 echo  $text; ?></textarea>
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
			<?php foreach (Auth::guard('ungvien')->user()->trinhdobangcap as $key => $value): ?>



			<div class="row bg-main">
				<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
					<div class="card">


						<div class="card-header">
							<div class="row">
								

								<div class="col-6">
									Trình độ bằng cấp<span><small class="text-info" data-toggle="modal" data-target="#trinhdobangcap{{$key}}">... Cập nhật</small></span>
								</div><div class="col-6 text-right"><form action="ung-vien/ho-so/trinh-do-bang-cap-xoa/{{$value->id}}"> <button type="submit" class="close">X</form></div>
								</div></div>
								<div class="card-body row">

									<div class="col-8">
										<p class="card-text"><span class="font-weight-bold">Tên bằng cấp:</span> {{$value->tenbangcap}}</p>
										<p class="card-text"><span class="font-weight-bold">Trường đào tạo: </span> {{$value->truongdaotao}}</p>
										<p class="card-text"><span class="font-weight-bold">Chuyên ngành</span> {{$value->chuyennganh}}</p>
										<p class="card-text"><span class="font-weight-bold">Thời gian:</span> <?php $date=date_create($value->thoigiantotnghiep);
										echo date_format($date,"Y-m"); ?>
									</p>
								</div>
								<div class="col-4">	
									<p class="card-text"><span class="font-weight-bold"></span>  
						@if($value->anh!=null)
								<img style="height: 200px; max-width: 300px;" src="upload/img/ungvien/bangcap/{{$value->anh}}">
								@else
										<img style="height: 200px;" src="//placehold.it/200">  
									@endif</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade bd-example-modal-lg" id="trinhdobangcap{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="row">
								<div class="col-sm-12 text-center">
									<div class="card">
										<div class="card-header bg-white">

											<div class="row">
												<div class="col-6 text-left text-info">
													CẬP NHẬT TRÌNH ĐỘ BẰNG CẤP
												</div>
												<div class="col-6 text-right">
													<sub>	(*)Thông tin bắt buộc nhập</sub>
												</div>
											</div>
										</div>
										<div class="card-body">
											<form enctype="multipart/form-data" action="ung-vien/ho-so/trinh-do-bang-cap-sua/{{$value->id}}" method="POST">
												<input type="hidden" name="_token" value="{{csrf_token()}}"/>
												<div class="form-group row">
													<label for="tenbangcap" class="col-sm-4 col-form-label">Tên bằng cấp: *</label>
													<div class="col-sm-8">
														<input type="text " class="form-control" value="{{$value->tenbangcap}}" id="tenbangcap" name="tenbangcap">
													</div>
												</div>
												<div class="form-group row">
													<label for="truongdaotao" class="col-sm-4 col-form-label">Trường đào tạo: *</label>
													<div class="col-sm-8">
														<input type="text " class="form-control" value="{{$value->truongdaotao}}" id="truongdaotao" name="truongdaotao">
													</div>
												</div>
												<div class="form-group row">
													<label for="chuyennganh" class="col-sm-4 col-form-label">Chuyên nghành: *</label>
													<div class="col-sm-8">
														<input type="text " class="form-control" value="{{$value->chuyennganh}}" id="chuyennganh" name="chuyennganh">
													</div>
												</div>
												<div class="form-group row">
													<label for="thoigiantotnghiep" class="col-sm-4 col-form-label">Thời gian tốt nghiệp: *</label>
													<div class="col-sm-8">
														<input type="month" class="form-control" value="<?php $date=date_create($value->thoigianbatdau);
														echo date_format($date,"Y-m"); ?>" id="thoigiantotnghiep" name="thoigiantotnghiep">
													</div>
												</div>
												<div class="form-group row">
													<label for="anh" class="col-sm-4 col-form-label">Ảnh: </label>
													<div class="col-sm-8">
													<div class="custom-file">
																	<input  type="file" name="filesTestup" onchange="return fileValidationup()" class="custom-file-input" id="inputGroupFileup" aria-describedby="inputGroupFileAddonup">
																	<label class="custom-file-label"  for="inputGroupFileup">Chọn ảnh</label>
																</div>
												</div>
												</div>
												
												<div class="form-group row">
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary w-25">Lưu</button>
													</div>
												</div>
											</form>
											 <div  id="imagePreviewup">
											 	
											 		<div class="col-4">	
									<p class="card-text"><span class="font-weight-bold"></span>  
						@if($value->anh!=null)
								<img style="height: 200px; max-width: 300px;" src="upload/img/ungvien/bangcap/{{$value->anh}}">
								
									@endif</p>
								</div>
											 </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			<div class="row bg-main">
				<div class="col-sm-12 text-center" style="margin-top: 25px; margin-bottom: 25px;">
					<button type="button" data-toggle="modal" data-target="#trinhdobangcapmoi" class="btn btn-info">THÊM TRÌNH ĐỘ BẰNG CẤP</button>
				</div>
			</div>
			<div class="modal fade bd-example-modal-lg" id="trinhdobangcapmoi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="row">
							<div class="col-sm-12 text-center">
								<div class="card">
									<div class="card-header bg-white">

										<div class="row">
											<div class="col-6 text-left text-info">
												Trình độ bằng cấp
											</div>
											<div class="col-6 text-right">
												<sub>	(*)Thông tin bắt buộc nhập</sub>
											</div>
										</div>
									</div>
									<div class="card-body">
										<form  enctype="multipart/form-data" action="ung-vien/ho-so/trinh-do-bang-cap-moi" method="POST">
											<input type="hidden" name="_token" value="{{csrf_token()}}"/>
											<div class="form-group row">
												<label for="tenbangcap" class="col-sm-4 col-form-label">Tên bằng cấp: *</label>
												<div class="col-sm-8">
													<input type="text " class="form-control" value="" id="tenbangcap" name="tenbangcap">
												</div>
											</div>
											<div class="form-group row">
												<label for="truongdaotao" class="col-sm-4 col-form-label">Trường đào tạo: *</label>
												<div class="col-sm-8">
													<input type="text " class="form-control" value="" id="truongdaotao" name="truongdaotao">
												</div>
											</div>
											<div class="form-group row">
												<label for="chuyennganh" class="col-sm-4 col-form-label">Chuyên nghành: *</label>
												<div class="col-sm-8">
													<input type="text " class="form-control" value="" id="chuyennganh" name="chuyennganh">
												</div>
											</div>
											<div class="form-group row">
												<label for="thoigiantotnghiep" class="col-sm-4 col-form-label">Thời gian tốt nghiệp: *</label>
												<div class="col-sm-8">
													<input type="month" class="form-control" value="" id="thoigiantotnghiep" name="thoigiantotnghiep">
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

											<div class="form-group row">
												<div class="col-sm-10">
													<button type="submit" class="btn btn-primary w-25">Lưu</button>
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






			<?php foreach (Auth::guard('ungvien')->user()->kinhnghiemlamviec as $key => $value): ?>



			<div class="row bg-main">
				<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
					<div class="card">


						<div class="card-header">
							<div class="row">


								<div class="col-6">
									KINH NGHIỆM LÀM VIỆC<span><small class="text-info" data-toggle="modal" data-target="#kinhnghiemlamviec{{$key}}">... Cập nhật</small></span>
								</div><div class="col-6 text-right"><form action="ung-vien/ho-so/kinh-nghiem-lam-viec-xoa/{{$value->id}}"> <button type="submit" class="close">X</form></div>
								</div></div>

								<div class="card-body">
									<p class="card-text"><span class="font-weight-bold">Tên công ty:</span> {{$value->tencongty}}</p>
									<p class="card-text"><span class="font-weight-bold">Chức danh:</span> {{$value->chucdanh}}</p>
									<p class="card-text"><span class="font-weight-bold">Thời gian:</span> <?php $date=date_create($value->thoigianbatdau);
									echo date_format($date,"m/Y");
									?>-<?php 
									
								
										$date=date_create($value->thoigianketthuc);
										echo date_format($date,"m/Y");
									?></p>
									<p class="card-text"><span class="font-weight-bold">Mức lương:</span> {{number_format($value->mucluong)}} vnđ</p>
									<p class="card-text"><span class="font-weight-bold">Mô tả công việc :</span>
								<?php

 $text = $value->motacongviec;
    


													 echo  $text; ?></p>
									<p class="card-text"><span class="font-weight-bold">Thành tích:</span><?php

 $text = $value->thanhtich;
  


													 echo  $text; ?></p>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade bd-example-modal-lg" id="kinhnghiemlamviec{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="row">
									<div class="col-sm-12 text-center">
										<div class="card">
											<div class="card-header bg-white">

												<div class="row">
													<div class="col-6 text-left text-info">
														THAY ĐỔI
													</div>
													<div class="col-6 text-right">
														<sub>	(*)Thông tin bắt buộc nhập</sub>
													</div>
												</div>
											</div>
											<div class="card-body">
												<form action="ung-vien/ho-so/kinh-nghiem-lam-viec-sua/{{$value->id}}" method="POST">
													<input type="hidden" name="_token" value="{{csrf_token()}}"/>
													<div class="form-group row">
														<label for="tencongty" class="col-sm-4 col-form-label">Tên công ty: *</label>
														<div class="col-sm-8">
															<input type="text " class="form-control" value="{{$value->tencongty}}" id="tencongty" name="tencongty">
														</div>
													</div>
													<div class="form-group row">
														<label for="chucdanh" class="col-sm-4 col-form-label">Chức danh: *</label>
														<div class="col-sm-8">
															<input type="text " class="form-control" value="{{$value->chucdanh}}" id="chucdanh" name="chucdanh">
														</div>
													</div>
													<div class="form-group row">
														<label for="chucdanh" class="col-sm-4 col-form-label">Thời gian: *</label>
														<div class="col-sm-8 ">
															Bắt đầu<input type="month" class=" list-inline-item form-control" value="<?php $date=date_create($value->thoigianbatdau);
															echo date_format($date,"Y-m"); ?>" id="" name="thoigianbatdau">

															Kết thúc	<input type="month" class="form-control" value="<?php $date=date_create($value->thoigianketthuc);
															echo date_format($date,"Y-m"); ?>"    max="<?php echo date('m-Y'); ?>" id="" name="thoigianketthuc">

															<!--<input type="checkbox" id="" name="hiennay" <?php if($value->congviechientai==1) echo "checked";?> value="1"><label for="hiennay">Hiện nay</label><br>	-->								</div>
														</div>
														<div class="form-group row">
															<label for="mucluong" class="col-sm-4 col-form-label">Mức lương: *</label>
															<div class="col-sm-7">
																<input type="number" min="1" class="form-control" value="{{$value->mucluong}}" id="mucluong" name="mucluong">
															</div>
			<label for="mucluong" class="col-sm-1 col-form-label">vnđ</label>
														</div>
														<div class="form-group row">
															<label for="motacongviec" class="col-sm-4 col-form-label">Mô tả công việc: *</label>
															<div class="col-sm-8">
																<textarea type="text" rows="2" class="form-control" name="motacongviec"><?php

 $text = $value->motacongviec;
    $breaks = array("<br />","<br>","<br/>");  
    $text = str_ireplace($breaks, "", $text); 


													 echo  $text; ?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label for="thanhtich" class="col-sm-4 col-form-label">Thành tích: </label>
															<div class="col-sm-8">
																<textarea type="text" rows="2" class="form-control"  name="thanhtich"><?php

 $text = $value->thanhtich;
    $breaks = array("<br />","<br>","<br/>");  
    $text = str_ireplace($breaks, "", $text); 


													 echo  $text; ?></textarea>
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
					<?php endforeach ?>
					<div class="row bg-main">
						<div class="col-sm-12 text-center" style="margin-top: 25px; margin-bottom: 25px;">
							<button type="button" data-toggle="modal" data-target="#kinhnghiemlamviecmoi" class="btn btn-info">THÊM KINH NGIỆM LÀM VIỆC</button>
						</div>
					</div>
					<div class="modal fade bd-example-modal-lg" id="kinhnghiemlamviecmoi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="row">
									<div class="col-sm-12 text-center">
										<div class="card">
											<div class="card-header bg-white">

												<div class="row">
													<div class="col-6 text-left text-info">
														Kinh nghiệm làm việc
													</div>
													<div class="col-6 text-right">
														<sub>	(*)Thông tin bắt buộc nhập</sub>
													</div>
												</div>
											</div>
											<div class="card-body">
												<form action="ung-vien/ho-so/kinh-nghiem-lam-viec-moi" method="POST">
													<input type="hidden" name="_token" value="{{csrf_token()}}"/>
													<div class="form-group row">
														<label for="tencongty" class="col-sm-4 col-form-label">Tên công ty: *</label>
														<div class="col-sm-8">
															<input type="text " class="form-control" value="" id="tencongty" name="tencongty">
														</div>
													</div>
													<div class="form-group row">
														<label for="chucdanh" class="col-sm-4 col-form-label">Chức danh: *</label>
														<div class="col-sm-8">
															<input type="text " class="form-control" value="" id="chucdanh" name="chucdanh">
														</div>
													</div>
													<div class="form-group row">
														<label for="chucdanh" class="col-sm-4 col-form-label">Thời gian: *</label>
														<div class="col-sm-8 ">
															Bắt đầu<input type="month" class=" list-inline-item form-control"  max="<?php echo date('m-Y'); ?>" value="" id="" name="thoigianbatdau">

															Kết thúc	<input type="month" class="form-control" value=""    max="<?php echo date('m-Y'); ?>" id="" name="thoigianketthuc">

														<!--	<input type="checkbox" id="" name="hiennay" value="1"><label for="hiennay">Hiện nay</label><br>	-->								</div>
														</div>
												<!--		<div class="form-group row">
															<label for="mucluong" class="col-sm-4 col-form-label">Mức lương: *</label>
															<div class="col-sm-8">
																<input min="1" type="number" class="form-control" value="" id="mucluong"  name="mucluong">
															</div>
														</div>-->

														<div class="form-group row">
															<label for="mucluong" class="col-sm-4 col-form-label">Mức lương: *</label>
															<div class="col-sm-7">
																<input type="number" min="1" class="form-control" value="" name="mucluong">
															</div>
															<label for="mucluong" class="col-sm-1 col-form-label">vnđ</label>
														</div>
														<div class="form-group row">
															<label for="motacongviec" class="col-sm-4 col-form-label">Mô tả công việc: *</label>
															<div class="col-sm-8">
																<textarea type="text" rows="2" class="form-control" name="motacongviec"></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label for="thanhtich" class="col-sm-4 col-form-label">Thành tích: *</label>
															<div class="col-sm-8">
																<textarea type="text" rows="2" class="form-control"  name="thanhtich"></textarea>
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














						<?php foreach (Auth::guard('ungvien')->user()->ungvien_ngoaingu as $key => $value): ?>



						<div class="row bg-main">
							<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
								<div class="card">


									<div class="card-header">
										<div class="row">


											<div class="col-6">
												TRÌNH ĐỘ NGOẠI NGỮ<span><small class="text-info" data-toggle="modal" data-target="#trinhdongoaingu{{$key}}">... Cập nhật</small></span>
											</div><div class="col-6 text-right"><form action="ung-vien/ho-so/trinh-do-ngoai-ngu-xoa/{{$value->id_ngoaingu}}" method="GET"> <button type="submit" class="close">X</form></div>
											</div></div>
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

								<div class="modal fade bd-example-modal-lg" id="trinhdongoaingu{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="row">
												<div class="col-sm-12 text-center">
													<div class="card">
														<div class="card-header bg-white">

															<div class="row">
																<div class="col-6 text-left text-info">
																	THAY ĐỔI
																</div>
																<div class="col-6 text-right">
																	<sub>	(*)Thông tin bắt buộc nhập</sub>
																</div>
															</div>
														</div>
														<div class="card-body">
															<form action="ung-vien/ho-so/trinh-do-ngoai-ngu-sua/{{$value->id_ngoaingu}}" method="POST">
																<input type="hidden" name="_token" value="{{csrf_token()}}"/>
																<div class="form-group row">
																	<label for="ngoaingu" class="col-4 col-form-label">Ngoại ngữ: *</label>
																	<div class="col-8">
																		<select  class="form-control" id="ngoaingu" name="ngoaingu">
																			<?php foreach (App\ngoaingu::all() as $key1 => $value1): ?>
																				<option <?php if($value->id_ngoaingu==$value1->id) echo "selected"; ?>  value="{{$value1->id}}">{{$value1->tenngoaingu}}</option>
																			<?php endforeach ?>
																		</select>
																	</div>
																</div>

																<div class="form-group row">

																	<label  class="col-sm-4 col-form-label">Trình độ nghe: *</label>
																	<div class="col-sm-8 list-inline">
																		<div class="radio list-inline-item">
																			<label>
																				<input type="radio" name="trinhdonghe"  value="1" <?php if($value->trinhdonghe==1) echo "checked"; ?>  >
																				Tốt
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdonghe" value="2" <?php if($value->trinhdonghe==2) echo "checked";?>>
																				Khá
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdonghe"  value="3" <?php if($value->trinhdonghe==3) echo "checked"; ?>>
																				Trung bình
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdonghe"value="4" <?php  if($value->trinhdonghe==4) echo "checked"; ?>>
																				Kém
																			</label>
																		</div>
																	</div>

																</div>
																<div class="form-group row">

																	<label  class="col-sm-4 col-form-label">Trình độ nói: *</label>
																	<div class="col-sm-8 list-inline">
																		<div class="radio list-inline-item">
																			<label>
																				<input type="radio" name="trinhdonoi"  value="1" <?php if($value->trinhdonoi==1) echo "checked"; ?>  >
																				Tốt
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdonoi" value="2" <?php if($value->trinhdonoi==2) echo "checked";?>>
																				Khá
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdonoi"  value="3" <?php if($value->trinhdonoi==3) echo "checked"; ?>>
																				Trung bình
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdonoi"value="4" <?php  if($value->trinhdonoie==4) echo "checked"; ?>>
																				Kém
																			</label>
																		</div>
																	</div>

																</div>
																<div class="form-group row">

																	<label  class="col-sm-4 col-form-label">Trình độ đọc: *</label>
																	<div class="col-sm-8 list-inline">
																		<div class="radio list-inline-item">
																			<label>
																				<input type="radio" name="trinhdodoc"  value="1" <?php if($value->trinhdodoc==1) echo "checked"; ?>  >
																				Tốt
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdodoc" value="2" <?php if($value->trinhdodoc==2) echo "checked";?>>
																				Khá
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdodoc"  value="3" <?php if($value->trinhdodoc==3) echo "checked"; ?>>
																				Trung bình
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdodoc"value="4" <?php  if($value->trinhdodoc==4) echo "checked"; ?>>
																				Kém
																			</label>
																		</div>
																	</div>

																</div>
																<div class="form-group row">

																	<label  class="col-sm-4 col-form-label">Trình độ viết: *</label>
																	<div class="col-sm-8 list-inline">
																		<div class="radio list-inline-item">
																			<label>
																				<input type="radio" name="trinhdoviet"  value="1" <?php if($value->trinhdoviet==1) echo "checked"; ?>  >
																				Tốt
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdoviet" value="2" <?php if($value->trinhdoviet==2) echo "checked";?>>
																				Khá
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdoviet"  value="3" <?php if($value->trinhdoviet==3) echo "checked"; ?>>
																				Trung bình
																			</label>
																		</div>
																		<div class="radio  list-inline-item">
																			<label>
																				<input type="radio" name="trinhdoviet"value="4" <?php  if($value->trinhdoviet==4) echo "checked"; ?>>
																				Kém
																			</label>
																		</div>
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
							<?php endforeach ?>

							<div class="row bg-main">
								<div class="col-sm-12 text-center" style="margin-top: 25px; margin-bottom: 25px;">
									<button type="button" data-toggle="modal" data-target="#trinh-do-ngoai-ngu-moi" class="btn btn-info">THÊM NGOẠI NGỮ</button>
								</div>
							</div>
							<div class="modal fade bd-example-modal-lg" id="trinh-do-ngoai-ngu-moi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="row">
											<div class="col-sm-12 text-center">
												<div class="card">
													<div class="card-header bg-white">

														<div class="row">
															<div class="col-6 text-left text-info">
																Ngoại ngữ
															</div>
															<div class="col-6 text-right">
																<sub>	(*)Thông tin bắt buộc nhập</sub>
															</div>
														</div>
													</div>
													<div class="card-body">
														<form action="ung-vien/ho-so/trinh-do-ngoai-ngu-moi" method="POST">
															<input type="hidden" name="_token" value="{{csrf_token()}}"/>
															<div class="form-group row">
																<label for="ngoaingu" class="col-4 col-form-label">Ngoại ngữ: *</label>
																<div class="col-8">
																	<select  class="form-control" id="ngoaingumoi" name="ngoaingu">

																	</select>
																</div>
															</div>

															<div class="form-group row">

																<label  class="col-sm-4 col-form-label">Trình độ nghe: *</label>
																<div class="col-sm-8 list-inline">
																	<div class="radio list-inline-item">
																		<label>
																			<input type="radio" name="trinhdonghe"  value="1"   >
																			Tốt
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdonghe" value="2" >
																			Khá
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdonghe"  value="3" >
																			Trung bình
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdonghe"value="4" >
																			Kém
																		</label>
																	</div>
																</div>

															</div>
															<div class="form-group row">

																<label  class="col-sm-4 col-form-label">Trình độ nói: *</label>
																<div class="col-sm-8 list-inline">
																	<div class="radio list-inline-item">
																		<label>
																			<input type="radio" name="trinhdonoi"  value="1">
																			Tốt
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdonoi" value="2">
																			Khá
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdonoi"  value="3">
																			Trung bình
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdonoi" value="4">
																			Kém
																		</label>
																	</div>
																</div>

															</div>
															<div class="form-group row">

																<label  class="col-sm-4 col-form-label">Trình độ đọc: *</label>
																<div class="col-sm-8 list-inline">
																	<div class="radio list-inline-item">
																		<label>
																			<input type="radio" name="trinhdodoc"  value="1"   >
																			Tốt
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdodoc" value="2">
																			Khá
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdodoc"  value="3">
																			Trung bình
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdodoc"value="4" >
																			Kém
																		</label>
																	</div>
																</div>

															</div>
															<div class="form-group row">

																<label  class="col-sm-4 col-form-label">Trình độ viết: *</label>
																<div class="col-sm-8 list-inline">
																	<div class="radio list-inline-item">
																		<label>
																			<input type="radio" name="trinhdoviet"  value="1"   >
																			Tốt
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdoviet" value="2" >
																			Khá
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdoviet"  value="3" >
																			Trung bình
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="trinhdoviet"value="4" >
																			Kém
																		</label>
																	</div>
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














							<div class="modal fade bd-example-modal-lg" id="thaydoihoso" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="row">
											<div class="col-sm-12 text-center">
												<div class="card">
													<div class="card-header bg-white">

														<div class="row">
															<div class="col-6 text-left text-info">
																THAY ĐỔI
															</div>
															<div class="col-6 text-right">

																<sub>	(*)Thông tin bắt buộc nhập</sub>
															</div>
														</div>




													</div>
													<div class="card-body">
														<form action="ung-vien/ho-so" method="POST">
															<input type="hidden" name="_token" value="{{csrf_token()}}"/>
															<div class="form-group row">
																<label for="vitrimongmuon" class="col-sm-4 col-form-label">Vị trí mong muốn: *</label>
																<div class="col-sm-8">
																	<input type="text " class="form-control" value="{{Auth::guard('ungvien')->user()->vitrimongmuon}}" id="vitrimongmuon" name="vitrimongmuon">
																</div>
															</div>
	<div class="form-group row">
															<label for="mucluong" class="col-sm-4 col-form-label">Mức lương: *</label>
															<div class="col-sm-7">
																<input type="number" min="1" class="form-control" value="{{Auth::guard('ungvien')->user()->mucluongmongmuon}}"  id="mucluongmongmuon" name="mucluongmongmuon">
															</div>
															<label for="mucluong" class="col-sm-1 col-form-label">vnđ</label>
														</div>
															<div class="form-group row">
																<label for="nganhnghe" class="col-4 col-form-label">Ngành nghề: *</label>
																<div class="col-8">
																	<select  class="form-control" id="nganhnghe" name="nganhnghe">

																	</select>
																</div>
															</div>

															<div class="form-group row">
																<label for="exampleSelect1" class="col-sm-4 col-form-label">Kỹ năng: *</label>
																<div class="col-sm-8">
																	<div class="dropdown w-100 ">

																		<div class="dropdown-toggle w-100 form-control" href="#" role="button" id="dropdownKynang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			Chọn kỹ năng
																		</div>

																		<div class="dropdown-menu w-100" aria-labelledby="dropdownKynang" id="dropdownKynanglist">
																		</div>
																	</div>
																</div>
															</div>
															<div class="form-group row">
																<label for="capbac" class="col-4 col-form-label">Cấp bậc: *</label>
																<div class="col-8">
																	<select  class="form-control" id="capbac" name="capbac">

																	</select>
																</div>
															</div>
															<div class="form-group row">
																<label for="hinhthuclamviec" class="col-4 col-form-label">Hình thức làm việc: *</label>
																<div class="col-8">
																	<select  class="form-control" id="hinhthuclamviec" name="hinhthuclamviec">

																	</select>
																</div>
															</div>
															<div class="form-group row">
																<label for="kinhnghiem" class="col-4 col-form-label">Kinh nghiệm: *</label>
																<div class="col-8">
																	<select  class="form-control" id="kinhnghiem" name="kinhnghiem">

																	</select>
																</div>
															</div>
															<div class="form-group row">
																<label for="trinhdo" class="col-4 col-form-label">Trình độ: *</label>
																<div class="col-8">
																	<select  class="form-control" id="trinhdo" name="trinhdo">

																	</select>
																</div>
															</div>
															<div class="form-group row">
																<label for="thanhpho" class="col-sm-4 col-form-label">Thành phố: *</label>
																<div class="col-sm-8">
																	<label class="sr-only">Thành phố</label>
																	<select class="form-control w-100" id="thanhpho">
																		<option >Thành phố</option>
																	</select>
																	<div id="dsthanhpho" class="list-inline">


																	</div>
																</div>
																
															</div>
<div class="form-group row">

																<label  class="col-sm-4 col-form-label">Tìm kiếm và nhận Mail: *</label>
																<div class="col-sm-8 list-inline">
																	
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="timkiem"  value="1" <?php if(Auth::guard('ungvien')->user()->timkiem==1) echo "checked"; ?>  >
																			Có
																		</label>
																	</div>
																	<div class="radio  list-inline-item">
																		<label>
																			<input type="radio" name="timkiem"value="2" <?php if(Auth::guard('ungvien')->user()->timkiem==2) echo "checked"; ?>>
																			Không
																		</label>
																	</div>
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




















							<?php foreach (Auth::guard('ungvien')->user()->nguoithamkhao as $key => $value): ?>



							<div class="row bg-main">
								<div class="col-sm-12 " style="margin-top: 25px; margin-bottom: 25px;">
									<div class="card">


										<div class="card-header">
											<div class="row">


												<div class="col-6">
													NGƯỜI THAM KHẢO<span><small class="text-info" data-toggle="modal" data-target="#nguoithamkhao{{$key}}">... Cập nhật</small></span>
												</div>
												<div class="col-6 text-right"><form action="ung-vien/ho-so/nguoi-tham-khao-xoa/{{$value->id}}"> <button type="submit" class="close">X</form>
												</div>
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

							<div class="modal fade bd-example-modal-lg" id="nguoithamkhao{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="row">
											<div class="col-sm-12 text-center">
												<div class="card">
													<div class="card-header bg-white">

														<div class="row">
															<div class="col-6 text-left text-info">
																THAY ĐỔI
															</div>
															<div class="col-6 text-right">
																<sub>	(*)Thông tin bắt buộc nhập</sub>
															</div>
														</div>
													</div>
													<div class="card-body">
														<form action="ung-vien/ho-so/nguoi-tham-khao-sua/{{$value->id}}" method="POST">
															<input type="hidden" name="_token" value="{{csrf_token()}}"/>
															<div class="form-group row">
																<label for="hoten" class="col-sm-4 col-form-label">Họ tên: *</label>
																<div class="col-sm-8">
																	<input type="text " class="form-control" value="{{$value->hoten}}" id="hoten" name="hoten">
																</div>
															</div>
															<div class="form-group row">
																<label for="congty" class="col-sm-4 col-form-label">Công ty: *</label>
																<div class="col-sm-8">
																	<input type="text " class="form-control" value="{{$value->congty}}" id="congty" name="congty">
																</div>
															</div>
															<div class="form-group row">
																<label for="chucvu" class="col-sm-4 col-form-label">Chức vụ: *</label>
																<div class="col-sm-8">
																	<input type="text " class="form-control" value="{{$value->chucvu}}" id="chucvu" name="chucvu">
																</div>
															</div>
															<div class="form-group row">
																<label for="sodienthoai" class="col-sm-4 col-form-label">Số điện thoại: *</label>
																<div class="col-sm-8">
																	<input type="number" min="0" class="form-control" value="{{$value->sodienthoai}}" id="sodienthoai" name="sodienthoai">
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
						<?php endforeach ?>
						<div class="row bg-main">
							<div class="col-sm-12 text-center" style="margin-top: 25px; margin-bottom: 25px;">
								<button type="button" data-toggle="modal" data-target="#nguoithamkhaomoi" class="btn btn-info">THÊM NGƯỜI THAM KHẢO</button>
							</div>
						</div>
@if(Auth::guard('ungvien')->user()->id_nganhnghe)
						<div class="row bg-main">
							<div class="col-sm-12 text-center" style="margin-top: 25px; margin-bottom: 25px;">
								<a type="button" href="ung-vien/cv" class="btn btn-info">XEM CV BẢN IN</a>
							</div>
						</div>
@endif

						<div class="modal fade bd-example-modal-lg" id="nguoithamkhaomoi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="row">
										<div class="col-sm-12 text-center">
											<div class="card">
												<div class="card-header bg-white">

													<div class="row">
														<div class="col-6 text-left text-info">
															Người tham khảo
														</div>
														<div class="col-6 text-right">
															<sub>	(*)Thông tin bắt buộc nhập</sub>
														</div>
													</div>
												</div>
												<div class="card-body">

													<form action="ung-vien/ho-so/nguoi-tham-khao-moi" method="POST">
														<input type="hidden" name="_token" value="{{csrf_token()}}"/>
														<div class="form-group row">
															<label for="hoten" class="col-sm-4 col-form-label">Họ tên: *</label>
															<div class="col-sm-8">
																<input type="text " class="form-control" value=""  name="hoten">
															</div>
														</div>
														<div class="form-group row">
															<label for="congty" class="col-sm-4 col-form-label">Công ty: *</label>
															<div class="col-sm-8">
																<input type="text " class="form-control" value=""  name="congty">
															</div>
														</div>
														<div class="form-group row">
															<label for="chucvu" class="col-sm-4 col-form-label">Chức vụ: *</label>
															<div class="col-sm-8">
																<input type="text " class="form-control" value=""name="chucvu">
															</div>
														</div>
														<div class="form-group row">
															<label for="sodienthoai" class="col-sm-4 col-form-label">Số điện thoại: *</label>
															<div class="col-sm-8">
																<input type="number" min="0" class="form-control" value="" id="sodienthoai" name="sodienthoai">
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





						@endsection
						@section('script')

						<script type="text/javascript">


							$(document).ready(function(){




								$.ajax({
									type:'GET',
									url:'api/ngoaingu',
									success:function(data){

										var kq='';
										$.each(data,function(k,v){				
											kq= '<option value="'+v.id+'">'+v.tenngoaingu+'</option>';

											$('#ngoaingumoi').append(kq);					
										});


									}
								});



								$.ajax({
									type:'GET',
									url:'api/thanhpho',
									success:function(data){

										var kq='';
										$.each(data,function(k,v){				
											kq= '<option value="'+v.id+'">'+v.tenthanhpho+'</option>';

											$('#thanhpho').append(kq);					
										});
										localStorage.clear();

									}
								});



						/*		$.ajax({
									type:'GET',
									url:'api/kynang/'+{{Auth::guard('ungvien')->user()->id_nganhnghe}},
									success:function(data){
										$('#dropdownKynanglist').html('');
										var kq='';
										$.each(data,function(k,v){
											kq='<div class="form-check">    <input type="checkbox" class="form-check-input" id="kynang'+v.id+'"  name="kynang[]" value="'+v.id+'">    <label class="form-check-label" for="kynang'+v.id+'">'+v.tenkynang+'</label>  </div>';

											$('#dropdownKynanglist').append(kq);
										});

									}
								});*/



								$.ajax({

									type:'GET',
									url:'api/kinhnghiem',
									success:function(data){

										var kq='';
										$.each(data,function(k,v){				
											kq= '<option  value="'+v.id+'">'+v.tenkinhnghiem+'</option>';
											if(v.id=={{Auth::guard('ungvien')->user()->id_kinhnghiem==null?0:Auth::guard('ungvien')->user()->id_kinhnghiem}})
										
												kq= '<option selected value="'+v.id+'">'+v.tenkinhnghiem+'</option>';
											$('#kinhnghiem').append(kq);					
										});

									}
								});
									$.ajax({

									type:'GET',
									url:'api/trinhdo',
									success:function(data){

										var kq='';
										$.each(data,function(k,v){				
											kq= '<option  value="'+v.id+'">'+v.tentrinhdo+'</option>';
									if(v.id=={{Auth::guard('ungvien')->user()->id_trinhdo==null?0:Auth::guard('ungvien')->user()->id_trinhdo}})
												kq= '<option selected value="'+v.id+'">'+v.tentrinhdo+'</option>';
											$('#trinhdo').append(kq);					
										});

									}
								});

								$.ajax({

									type:'GET',
									url:'api/nganhnghe',
									success:function(data){

										var kq='';
										$.each(data,function(k,v){				
											kq= '<option  value="'+v.id+'">'+v.tennganhnghe+'</option>';
											if(v.id=={{Auth::guard('ungvien')->user()->id_nganhnghe==null?0:Auth::guard('ungvien')->user()->id_nganhnghe}})
												kq= '<option selected value="'+v.id+'">'+v.tennganhnghe+'</option>';
											$('#nganhnghe').append(kq);					
										});

									}
								});
								$.ajax({

									type:'GET',
									url:'api/capbac',
									success:function(data){

										var kq='';
										$.each(data,function(k,v){				
											kq= '<option  value="'+v.id+'">'+v.tencapbac+'</option>';
											if(v.id=={{Auth::guard('ungvien')->user()->id_capbac==null?0:Auth::guard('ungvien')->user()->id_capbac}})
												kq= '<option selected value="'+v.id+'">'+v.tencapbac+'</option>';
											$('#capbac').append(kq);					
										});

									}
								});
								$.ajax({

									type:'GET',
									url:'api/hinhthuclamviec',
									success:function(data){

										var kq='';
										$.each(data,function(k,v){				
											kq= '<option  value="'+v.id+'">'+v.tenhinhthuclamviec+'</option>';
										if(v.id=={{Auth::guard('ungvien')->user()->id_hinhthuclamviec==null?0:Auth::guard('ungvien')->user()->id_hinhthuclamviec}})
												kq= '<option selected value="'+v.id+'">'+v.tenhinhthuclamviec+'</option>';
											$('#hinhthuclamviec').append(kq);					
										});

									}
								});


							});


							function remove(id,id2) {

								document.getElementById(id.id).remove();

								localStorage.removeItem(id2);
							}
							$('#thanhpho').change(function(){

								$.ajax({
									type:'GET',
									url:'api/thanhpho/'+$('#thanhpho').val(),
									success:function(data){

										var kq='';
										$.each(data,function(k,v){	


											if($('#thanhpho'+v.id).val()!=v.id)
											{
												if(localStorage.length<3){

													kq= '<div class="list-inline-item w-25" id="form-check-'+v.id+'" title="Xóa" onclick="remove(this,'+v.id+')" >    <input  type="checkbox" checked  id="thanhpho'+v.id+'"  name="thanhpho[]" value="'+v.id+'" class="custom-control-input">    <label class="" for="thanhpho'+v.id+'">'+v.tenthanhpho+' x</label>  </div>';

													$('#dsthanhpho').append(kq);

													localStorage.setItem(v.id,v.tenthanhpho);	}	
												}	$('#thanhpho').val('Thành phố');
											});



									}
								});


							});



							$('#nganhnghe').change(function(){

								$.ajax({
									type:'GET',
									url:'api/kynang/'+$('#nganhnghe').val(),
									success:function(data){
										$('#dropdownKynanglist').html('');
										var kq='';
										$.each(data,function(k,v){
											kq='<div class="form-check">    <input type="checkbox" class="form-check-input" id="kynang'+v.id+'"  name="kynang[]" value="'+v.id+'">    <label class="form-check-label" for="kynang'+v.id+'">'+v.tenkynang+'</label>  </div>';

											$('#dropdownKynanglist').append(kq);
										});

									}
								});
							});


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

				function fileValidationup(){
		var fileInput = document.getElementById('inputGroupFileup');
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
		document.getElementById('imagePreviewup').innerHTML = '<img style="width:400px;height:300px;" src="'+e.target.result+'"/>';
	};
	reader.readAsDataURL(fileInput.files[0]);
}
}
}
						</script>

						@endsection
