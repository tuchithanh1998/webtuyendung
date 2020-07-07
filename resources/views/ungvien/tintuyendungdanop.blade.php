@extends('ungvien.layout')
@section('content')
<div style="min-height: 600px;">
<div class="row bg-main">
		<div class="col-sm-12 offset-sm-0 text-center" style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">

<div class="row ">
	<div class="col-12 text-center">
	  <table class="table table-inverse">
	  	<thead>
	  		<tr>
	  			<th></th>
	  			<th>Tiêu đề</th>
	  			<th>Công ty</th>
	  			<th>Hết hạn</th>
	  			<th></th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php foreach ($data as $key => $value): ?>
	  			<tr>
	  				<td>{{$key+1}}</td>
	  				<td><a href="tintuyendung/{{$value->id}}">{{$value->tintuyendung->tieudetuyendung}}</a></td>
	  				<td><a href="">{{$value->tintuyendung->nhatuyendung->tencongty}}</a></td>
	  				<td><?php $date=date_create($value->tintuyendung->hannophoso);
										echo date_format($date,"d/m/Y");
										?></td>
										<td><?php echo $value->trangthainoptin->tentrangthainoptin; ?></td>
	  			</tr>
	  		<?php endforeach ?>
	  	</tbody>
	  </table>
	</div>
</div>

			</div></div></div>
</div>

@endsection
@section('script')
@endsection