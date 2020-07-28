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
									echo $date= date_format($date,"d/m/Y");
									?></td>
									<td class="text-center"><a href="nha-tuyen-dung/tin-da-dang/{{$value->id}}">{{count($value->ungvien_nop_tin)}}</a></td>
									<td>
										@if($value->trangthai==1 && $value->hannophoso >  date("Y-m-d H:i:s"))
										<button  type="button"   data-toggle="modal" data-target="#modal{{$value->id}}" class="btn btn-light">Hủy</button>
										@elseif($value->trangthai==1)
											<button  type="button" class="btn btn-light">Hết hạn</button>
										@else
										<button  type="button" class="btn btn-light">Đã hủy</button>
										@endif
										
									</td>

									<div class="modal fade" id="modal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Hủy tin tuyển dụng</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
													<form action="nha-tuyen-dung/tin-da-dang/huy/{{$value->id}}" method="GET"><button type="submit" class="btn btn-primary">Xác nhận</button></form>
												</div>
											</div>
										</div>
									</div>

								</tr>
							<?php endforeach ?>
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

