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
	});
</script>
@endsection
