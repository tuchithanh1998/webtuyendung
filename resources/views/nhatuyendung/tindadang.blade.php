@extends('nhatuyendung.layout')
@section('content')

<div style="min-height: 600px;">
<div class="row bg-main">
		<div class="col-sm-12 offset-sm-0 text-center" style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">

<div class="row">
	<div class="col-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th></th>
					<th>Tiêu đề</th>
					<th>Hạn nộp</th>
					<th class="text-center" >Số lượng ứng viên</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach (Auth::guard('nhatuyendung')->user()->tintuyendung as $key => $value): ?>
					<tr>
						<td>{{$key+1}}</td>
						<td><a href="nha-tuyen-dung/tin-tuyen-dung/{{$value->id}}">{{$value->tieudetuyendung}}</a></td>
							<td><?php $date=date_create($value->hannophoso);
										echo date_format($date,"d/m/Y");
										?></td>
							<td class="text-center"><a href="nha-tuyen-dung/tin-da-dang/{{$value->id}}">{{count($value->ungvien_nop_tin)}}</a></td>
							<td>
									@if($value->trangthai==1)
								<form action="nha-tuyen-dung/tin-da-dang/huy/{{$value->id}}" method="GET"><button  type="submit" class="btn btn-light">Hủy</button></form>
									@else
									<button  type="button" class="btn btn-light">Đã hủy</button>
									@endif
							</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	  	
	</div>
</div>


</div></div></div></div>
@endsection
@section('script')


@endsection

