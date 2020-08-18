@extends('ungvien.layout')
@section('content')
<a href="{{ url()->previous() }}" class="btn btn-primary"  role="button" style="position: fixed; bottom: 10px; right: 10px; z-index: 1;">Quay lại</a>
<div class="row bg-main">
	<div class="col-12" style="margin-top: 10px; margin-bottom: 5px;">
		<div class="card mb-3 w-100">
			<div class="row no-gutters">
				<div class="col-3">
					@if($data->logo)
										<img class="w-100" src="upload/img/nhatuyendung/logo/{{$data->logo}}"
										class="img-fluid" alt="{{$data->tencongty}}" title="{{$data->tencongty}}">
										@else								
										<img src="//placehold.it/240"
										class="img-fluid w-100" alt="{{$data->tencongty}}" title="{{$data->tencongty}}">
										@endif
				</div>
				<div class="col-9">
					<div class="card-body">
						<h5 class="card-title">{{$data->tencongty}}</h5>
						<p class="card-text"><span class="font-weight-bold text-info">Địa chỉ: </span>{{$data->diachicongty}} {{$data->thanhpho->tenthanhpho}}</p>
						<p class="card-text"><span class="font-weight-bold text-info">Số điện thoại: </span>{{$data->sodienthoai}}</p>					
						<p class="card-text"><span class="font-weight-bold text-info" >Website: </span><a href="http://{{$data->websitecongty}}">{{$data->websitecongty}}</a></p>
						<p class="card-text"><span class="font-weight-bold text-info">Quy mô nhân sự: </span>{{$data->quymonhansu->quymo}}</p>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	
<div class="row bg-white" style="margin-top: 5px; margin-bottom: 5px;">
	<div class="col-12">
		
		<ul class="list-group list-group-flush w-100">

			<?php 
			if(isset($data->tintuyendung)==true)
			{	
				if(count($data->tintuyendung)==0)
				{
					?>

					<li><h6>Không tìm thấy</h6></li>
				<?php }
				foreach ($data->tintuyendung as $key => $value): 
	  $today = date("Y-m-d");
  $expire =$value->hannophoso;
  $today_dt =  new DateTime(date("Y-m-d",mktime(0, 0, 0, date("m"), date("d"), date("Y"))));
  $expire_dt = new DateTime($expire);

  if ($expire_dt < $today_dt||$value->trangthai!=1) continue;
					?>	
					<li class="list-group-item" style="   padding: 0px; <?php  if($key!=0) echo "margin-top: 4px;"; ?>  margin-bottom: 0px;">
						<div class="card border-0" >
							<div class="row no-gutters ">
							<!--	<div class="col-auto" title="Công ty">
										@if($value->nhatuyendung->logo)
										<img style="width: 64px;height: 64px;" src="upload/img/nhatuyendung/logo/{{$value->nhatuyendung->logo}}"
										class="img-fluid" alt="{{$value->nhatuyendung->tencongty}}" title="{{$value->nhatuyendung->tencongty}}">
										@else								
										<img src="//placehold.it/64"
										class="img-fluid" alt="{{$value->nhatuyendung->tencongty}}" title="{{$value->nhatuyendung->tencongty}}">
										@endif
								</div>-->
								<div class="col">
									<div class="card-block px-2 ">
										<h6 class="card-title text-nowrap text-truncate" title="{{$value->tieudetuyendung}}" style="margin-top: 4px;"><a href="tintuyendung/{{$value->id}}">{{$value->tieudetuyendung}}</a></h6>
										<p class="card-text" title="{{$value->nhatuyendung->tencongty}}"><a href="danh-sach-tin-nha-tuyen-dung/{{$value->id_nhatuyendung}}.html" style="color:#6C757D;">{{$value->nhatuyendung->tencongty}}</a></p>											
									</div>
								</div>
								<div class="col-2 text-center" title="Mức lương">
									<img src="upload\img\layout\dollar-sign.svg">
									<p>{{$value->mucluong->tenmucluong}}</p>
								</div>						
								<div class="col-2 text-center " style="margin-left: 2px;" title='
								<?php foreach ($value->thanhpho as $key1 => $value1) {
									if ($key1!=0) {
										echo ",";
									}
									echo $value1->tenthanhpho;
								} ?>'>
								<img src="upload\img\layout\map-pin.svg"><p class="" >
									<?php foreach ($value->thanhpho as $key1 => $value1) {
										if ($key1!=0) {
											echo ",";
										}
										echo $value1->tenthanhpho;
									} ?>	
								</p>
							</div>
							<div class="col-2 text-center" title="Hạn nộp" style="margin-left: 2px;">
								<img src="upload\img\layout\clock.svg"><p> <?php $date=date_create($value->hannophoso);
										echo date_format($date,"d-m-Y"); ?></p>
							</div>
						<!--	<div class="col-1 text-center" title="Lưu việc làm" style="margin-left: 2px;">
								<span class="glyphicon glyphicon-cog blue"></span>
								<img src="upload\img\layout\clock.svg">
							</div> -->
						</div>
					</div>
				</li>
				

			<?php endforeach;
		} ?>
		
	</ul>


</div>
</div>

@endsection
@section('script')
@endsection
