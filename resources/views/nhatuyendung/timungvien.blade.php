@extends('nhatuyendung.layout')
@section('content')

<div class="row bg-main">
	<div class="col-12 " style="margin-top: 10px; margin-bottom: 5px;">
		<div class="card text-center">
			<h1 class="display-3">TÌM ỨNG VIÊN</h1>
			<div class="info-form ">
				<form action="nha-tuyen-dung/tim-ung-vien" method="GET" class="justify-content-center row" style="margin: 10px;">				
					<div class="col-6">
						<div class="form-group w-100">								
							<label class="sr-only">Ngành nghề</label>
							<select class="form-control w-100" id="nganhnghe" name="nganhnghe">
								<option  value="">Ngành nghề</option>							
							</select>
						</div>
					</div>
					<div class="col-6">

						<div class="form-group w-100">

							<div class="dropdown w-100 ">

								<div class="dropdown-toggle w-100 form-control" href="#" role="button" id="dropdownKynang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Kỹ năng
								</div>
							<div class="dropdown-menu w-100 text-center" aria-labelledby="dropdownKynang" id="dropdownKynanglist">
								</div>
							</div>
						</div>
					</div>
<button style="margin-top: 5px;" type="button submit" class="btn btn-info"><img src="upload\img\layout\search.svg">Tìm kiếm</button>




				</form>
			</div>
		</div>
	</div>
</div>

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
										<td><a href="nha-tuyen-dung/ung-vien/{{$value->id}}">{{$value->hoten}}</a></td>
										<td>{{$value->nganhnghe->tennganhnghe}}</td>
										<td class="text-center">

											<?php foreach ($value->ungvien_kynang as $key1 => $value1):
												if($key1!=0) echo ",";
												?>
												{{$value1->tenkynang}} 
											<?php endforeach ?>

										</td>
										<td  data-toggle="modal" data-target="#trangthai{{$key}}" style="margin: 0px;padding: 10px;" >
										
								
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
<script type="text/javascript">

	function getParameterByName(name, url) {
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, '\\$&');
		var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
		results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, ' '));
	}



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

	$(document).ready(function(){


		$.ajax({
			type:'GET',
			url:'api/nganhnghe',
			success:function(data){

				var kq='';
				$.each(data,function(k,v){

					kq= '<option value="'+v.id+'">'+v.tennganhnghe+'</option>';
					if(getParameterByName('nganhnghe')==v.id)
					{

						kq= '<option selected value="'+v.id+'">'+v.tennganhnghe+'</option>';

					}
					$('#nganhnghe').append(kq);
				});

			}
		});


			$.ajax({

		type:'GET',
		url:'api/kynang/'+getParameterByName('nganhnghe'),
		success:function(data){
			$('#dropdownKynanglist').html('');
			var kq='';
			$.each(data,function(k,v){
				kq='<div class="text-left"><div class="form-check">    <input type="checkbox" class="form-check-input " id="kynang'+v.id+'"  name="kynang[]" value="'+v.id+'">    <label class="form-check-label " for="kynang'+v.id+'">'+v.tenkynang+'</label>  </div></div';

				$('#dropdownKynanglist').append(kq);
			});

		}
	});
	});
</script>
@endsection
