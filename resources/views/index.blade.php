<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../../../favicon.ico">

	<title>Tuyển Dụng STU</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<!-- Custom styles for this template -->
	<link href="navbar-top-fixed.css" rel="stylesheet">
	<link rel="stylesheet" href="layout.css">
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #87CEEB !important;">
		<a class="navbar-brand" href=""><img id="logo" src="logo.png"></a>

		<button class="navbar-toggler" id="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="timkiemviec">Dành Cho Ứng Viên</a>
				</li>
			</ul>
			<ul class="navbar-nav mr-2 ">
				<li class="nav-item ">
					<a class="nav-link" href="nha-tuyen-dung">Dành Cho Nhà Tuyển Dụng</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid" id="container-fluid1">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" id="container1">
				<div class="carousel-item active">
					<img src="logo.png" class="d-block w-100" style="height: 350px;" alt="...">
				</div>
				<div class="carousel-item">
					<img src="logo.png" class="d-block w-100" style="height: 350px;" alt="...">
				</div>
				<div class="carousel-item">
					<img src="logo.png" class="d-block w-100" style="height: 350px;" alt="...">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div id="container" class="container">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 text-center">
				<h1 class="display-3">Tìm Việc Nhanh</h1>		
				<div class="info-form ">
					<p>Việc làm hôm nay tự tin làm cầu nối cho tuyển dụng và tìm việc thành công</p>
					<form action="timkiemviec" class="form-inline justify-content-center w-100" style="margin-bottom: 10px;">
						<div class="form-group w-25">
							<label class="sr-only">Tên công việc</label>
							<input type="text" class="form-control w-100" placeholder="Tên công việc" name="tencongviec">
						</div>
						<div class="form-group  w-25">
							<label class="sr-only">Ngành nghề</label>
							<select class="form-control w-100" id="nganhnghe" name="nganhnghe">
								<option selected value="">Ngành nghề</option>							
							</select>
						</div>
						<div class="form-group  w-25">
							<label class="sr-only">Địa điểm</label>
							<select class="form-control w-100" id="thanhpho" name="thanhpho">
								<option selected value="">Thành phố</option>

							</select>
						</div>
						<button type="submit" class="btn btn-info ">Tìm Kiếm</button>
					</form>
					<a href="" class="text-right"><img src="upload\img\layout\search.svg">Tìm kiếm nâng cao</a>
				</div>
				<br>
			</div>
		</div>
	</div>
	<div class=" bg-light">
		<div id="container" id="container-vieclam" class="container bg-light">
			<div class="col-sm-10 offset-sm-1 text-center">
				<h3 class="display-3">Việc Làm Mới</h3>
			</div>
			<div class="row ">
				<div class="col-12 container">
					<ul class="list-unstyled row">
						
						<?php $data=App\tintuyendung::where('trangthai',1)->where('hannophoso','>',new DateTime())->orderBy('id', 'DESC')->take(6)->get();
						foreach ($data as $key => $value) {
								

						?>
<li class="list-item col-6 py-2">
							<div class="card">
								<div class="row no-gutters">
									<div class="col-auto" title="Công ty">

										@if($value->nhatuyendung->logo)
										<img style="width: 120px;height: 120px;" src="upload/img/nhatuyendung/logo/{{$value->nhatuyendung->logo}}"
										class="img-fluid" alt="{{$value->nhatuyendung->tencongty}}" title="{{$value->nhatuyendung->tencongty}}">
										@else								
										<img src="//placehold.it/120"
										class="img-fluid" alt="{{$value->nhatuyendung->tencongty}}" title="{{$value->nhatuyendung->tencongty}}">
										@endif
									</div>
									<div class="col">
										<div class="card-block px-2">
											<h5 class="card-title  text-nowrap text-truncate " title="{{$value->tieudetuyendung}}" style="margin-top: 4px;text-decoration: none;"><a href="tintuyendung/{{$value->id}}">{{$value->tieudetuyendung}}</a></h5>
											
												<p class="card-text  text-nowrap text-truncate" title="{{$value->nhatuyendung->tencongty}}"><a href="danh-sach-tin-nha-tuyen-dung/{{$value->id_nhatuyendung}}.html" style="color: black;">{{$value->nhatuyendung->tencongty}}</a></p>
											<ul class="list-inline">
												<li class="list-inline-item"><p class="card-text "> 
													<img src="upload\img\layout\dollar-sign.svg">{{$value->mucluong->tenmucluong}}</p>
												</li>
												<li class="list-inline-item">
													<p class="card-text ">
														<img src="upload\img\layout\clock.svg">Hạn chót: <?php 

									$date=date_create($value->hannophoso);
									echo date_format($date,"d/m/Y");
									?>
													</p>
												</li>
											</ul> 
										</div>
									</div>
								</div>
							</div>
						</li>

						<?php
}

						?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="container" id="container-nganhnghe" class="container">
			<h3 class="display-3">Việc Làm Theo Ngành Nghề</h3>
			<div class="row" ><div class="col-12 container">
				<ul class="list-unstyled row" id="dsvieclam">

				</ul>
			</div></div>
		</div>

		<div class="container-fluid"  style="background-color: #87CEEB !important;">
			<div class="row ">
				<div class="col-sm-3">
					<img src="logo.png" class="d-block w-100" alt="...">
				</div>
				<div class="col-sm-3 ">
					<ul class="list-unstyled">
						<li>Từ Chí Thành</li>
						<li>Phạm Ngọc Thạch</li>
					</ul>  	  	  	  	 
				</div>
				<div class="col-sm-3">
					s
				</div>
				<div class="col-sm-3">
					s
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
			<script type="text/javascript">
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
						url:'api/nganhnghe',
						success:function(data){
							
							var kq='';
							$.each(data,function(k,v){

								kq= '<option value="'+v.id+'">'+v.tennganhnghe+'</option>';
								$('#nganhnghe').append(kq);
							});

						}
					});

					$.ajax({
						type:'GET',
						url:'api/nganhnghe',
						success:function(data){
							
							var kq='';
							$.each(data,function(k,v){

								kq= '<li class="list-item col-4 py-2"><a href="timkiemviec?nganhnghe='+v.id+'">'+v.tennganhnghe+'</a></li>';
								$('#dsvieclam').append(kq);
							});

						}
					});
				});
			</script>
		</body>
		</html>