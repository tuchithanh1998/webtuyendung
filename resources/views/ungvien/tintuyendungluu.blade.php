@extends('ungvien.layout')
@section('content')
<div style="min-height: 600px;">
<div class="row bg-main">
		<div class="col-sm-12 offset-sm-0 text-center" style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">

<div class="row">
	<div class="col-md-12">
	  <table class="table table-inverse">
	  	<thead>
	  		<tr>
	  			<th></th>
	  			<th>Tiêu đề</th>
	  			<th>Công ty</th>
	  			<th>Ngày hết hạn nộp hồ sơ</th>
	  			<th></th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php 
$giatri=0;
	  		foreach ($data as $key => $value):

$today = date("Y-m-d");
$expire = $value->tintuyendung->hannophoso;
 $today_dt = new DateTime($today);
 $expire_dt = new DateTime($expire);
 
if ($expire_dt > $today_dt) {


$giatri++;

	  		 ?>
	  			<tr>
	  				<td>{{$giatri}}</td>
	  				<td><a href="tintuyendung/{{$value->tintuyendung->id}}">{{$value->tintuyendung->tieudetuyendung}}</a></td>
	  				<td><a href="danh-sach-tin-nha-tuyen-dung/{{$value->tintuyendung->nhatuyendung->id}}.html">{{$value->tintuyendung->nhatuyendung->tencongty}}</a></td>
	  				<td><?php $date=date_create($value->tintuyendung->hannophoso);
										echo date_format($date,"d/m/Y");
										?></td>
										
	  			</tr>
	  		<?php  } endforeach ?>
	  	</tbody>
	  </table>
	</div>
</div>
</div></div></div></div>
@endsection
@section('script')
@endsection