@extends('nhatuyendung.layout')
@section('content')

<div style="min-height: 600px;">
	<div class="row bg-main">
		<div class="col-sm-12 offset-sm-0 text-center" style="margin-top: 25px; margin-bottom: 25px;">
			<div class="card">

				<div class="row">
					<div class="col-12">
						<table class="table table-inverse">
							<thead>
								<tr>
									<th></th>
									<th>Tên ứng viên</th>
									<th>Ngành nghề</th>
									<th>Email</th>
									<th>Số điện thoại</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php 

								foreach ($data as $key => $value):
									{


										?>
										<tr>
											<td>{{$key+1}}</td>
											<td><a href="nha-tuyen-dung/ung-vien/{{$value->ungvien->id}}">{{$value->ungvien->hoten}}</a></td>
											<td>{{$value->ungvien->nganhnghe->tennganhnghe}}</td>
											<td>{{$value->ungvien->email}}</td>
											<td>{{$value->ungvien->sodienthoai}}</td>
											<td><form action="nha-tuyen-dung/ung-vien/xoa/{{$value->ungvien->id}}" method="GET"><button class="btn btn-primary" >Xóa</button></form></td>
										</tr>
									<?php  } endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('script')


	@endsection