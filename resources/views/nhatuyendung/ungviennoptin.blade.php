@extends('nhatuyendung.layout')
@section('content')
<a href="{{ url()->previous() }}" class="btn btn-primary"  role="button" style="position: fixed; bottom: 10px; right: 10px; z-index: 1;">Quay lại</a>

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
									<th>Họ tên</th>
									<th>Ngành nghề</th>
									<th >Kỹ năng</th>
									<th></th>
								
								</tr>
							</thead>
							<tbody class="">
								<?php foreach ($data as $key => $value): ?>
									<tr>
										<td>{{$key+1}}</td>
										<td><a href="nha-tuyen-dung/ung-vien/{{$value->ungvien->id}}">{{$value->ungvien->hoten}}</a></td>
										<td>{{$value->ungvien->nganhnghe->tennganhnghe}}</td>
										<td class="text-center">

											<?php foreach ($value->ungvien->ungvien_kynang as $key1 => $value1):
												if($key1!=0) echo ",";
												?>
												{{$value1->tenkynang}} 
											<?php endforeach ?>

										</td>
										<td  data-toggle="modal" data-target="#trangthai{{$key}}" style="margin: 0px;padding: 10px;" >
										<button type="button" style="padding: 0px; margin: 0px;" class=" w-100">{{$value->trangthainoptin->tentrangthainoptin}}</button>			</td>
								
									</tr>



<div class="modal fade" id="trangthai{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="nha-tuyen-dung/tin-da-dang/{{$value->id_tintuyendung}}/{{$value->id_ungvien}}" method="POST">
    		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <div class="modal-body">

<?php foreach (App\trangthainoptin::all() as $key5 => $value5): ?>
	<div class="radio">
       	<label>
       		<input type="radio" name="trangthaiRadios" value="{{$value5->id}}" <?php if($value->id_trangthainoptin==$value5->id) echo "checked";  if($value->id_trangthainoptin>$value5->id) echo "disabled"; ?> >
       {{$value5->tentrangthainoptin}}
       	</label>
       </div>
<?php endforeach ?>

    
      </div>
      <div class="modal-footer">
     
        <button type="submit" class="btn btn-primary">Lưu</button>
      </div></form>
    </div>
  </div>
</div>

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