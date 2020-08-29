@extends('ungvien.layout')
@section('content')


<!--<input type="button" id="" value="Xuất file PDF">-->
<div class="container-fluid card" style="margin-bottom: 40px;margin-top: 30px;">
    <form class="form " style="max-width: none; width: 714px; margin-top: 10px;">
<div style="padding-left: 5px;padding-right: 5px;">
        <div class="row">
            <div class="col-3">
              <div class="card rounded-0"  style=" width:114px; height:152px;">

                @if(Auth::guard('ungvien')->user()->anhdaidien)
                <img  class="card-img-top rounded-0" style="text-align: center; width:114px; height: 152px;" src="upload/img/ungvien/anhdaidien/{{Auth::guard('ungvien')->user()->anhdaidien}}" alt="">
                @else
                <img  class="card-img-top " style="text-align: center; width:114px; height: 152px;" src="//placehold.it/64" alt="">    
                @endif            
            </div>
        </div>
        <div class="col-9">
         <h3>{{Auth::guard('ungvien')->user()->hoten}}</h3>
         <p style="font-family: Tahoma;margin-bottom: 1;">{{Auth::guard('ungvien')->user()->vitrimongmuon}}</p>
         <div class="row">
          <div class="col-4" style="margin: 0px; padding-right: 0px;">

           <p style="margin: 1px; padding: 1px; font-family: Tahoma;">Ngày sinh: </p>
           <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;">Giới tính: </p>
           <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;">Điện thoại: </p>
           <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;">Email: </p>
           <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;">Địa chỉ: </p>
       </div>
       <div class="col-8" style="margin: 0px; padding-left: 0px;">
        <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;"> <?php 
    $date = date_create(Auth::guard('ungvien')->user()->ngaysinh);
    echo date_format($date, 'd-m-Y');

    ?></p>
        <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;"><?php if(Auth::guard('ungvien')->user()->gioitinh==1) echo "Nam"; 
        if(Auth::guard('ungvien')->user()->gioitinh==2) echo "Nữ";?></p>
        <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;">{{Auth::guard('ungvien')->user()->sodienthoai}}</p>

        <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;">{{Auth::guard('ungvien')->user()->email}}</p>
        <p style="margin: 1px; padding: 1px;font-family: Tahoma;margin-top: 0px;margin-bottom: 1;">{{Auth::guard('ungvien')->user()->diachi}} {{Auth::guard('ungvien')->user()->thanhpho->tenthanhpho}}</p>
    </div>
</div>
</div>
</div>
<br>
<div class="row">

    <div class="col-12">
        <h5 >Mục tiêu nghề nghiệp</h5>
        <hr class="my-1" >
        <p ><?php echo  Auth::guard('ungvien')->user()->muctieu; ?></p>

    </div>
</div>
<div class="row">
   <div class="col-12">
    <h5>Học Vấn</h5> <hr class="my-1" >
</div>

<?php

$trinhdobangcap=App\trinhdobangcap::where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();

foreach ($trinhdobangcap as $key => $value) {

 ?>
 <div class="col-4">
    <?php 
    $date = date_create($value->thoigiantotnghiep);
    echo date_format($date, 'm-Y');

    ?>

</div>
<div class="col-8">
   <p style="margin: 0px;">  {{$value->truongdaotao}}</p>
   <p style="margin: 0px;">  {{$value->chuyennganh}}</p>
   <p style="margin: 0px;">  {{$value->tenbangcap}}</p>
</div>
</div>
<?php } ?>

<div class="row">
   <div class="col-12">
    <h5>Kinh Nghiệm</h5> <hr class="my-1">
</div>

<?php

$kinhnghiemlamviec=App\kinhnghiemlamviec::where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();

foreach ($kinhnghiemlamviec as $key => $value) {

 ?>

 <div class="col-4">
     <?php $date=date_create($value->thoigianbatdau);
     echo date_format($date,"m/Y");
     ?>-<?php 
     
     
     $date=date_create($value->thoigianketthuc);
     echo date_format($date,"m/Y");
     ?>
 </div>
 <div class="col-8">
   <p style="margin: 0px;">{{$value->tencongty}}</p>
   <p style="margin: 0px;">{{$value->chucdanh}}</p>
   
</div>
<?php } ?>
</div>
<div class="row">
   <div class="col-12">
    <h5>Kỹ năng</h5> <hr class="my-1">
</div>

<div class="col-12 container">
    <ul class="list-unstyled row">
        <?php

        $kynang=App\ungvien_kynang::where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();

        foreach ($kynang as $key => $value) {

         ?>
         <li class="border-0 list-item col-4 py-0">
          {{$value->kynang->tenkynang}}
      </li>
  <?php } ?>
</ul>
</div>
</div>
<div class="row">
   <div class="col-12">
    <h5>Trình độ ngoại ngữ</h5> <hr class="my-1">
</div>

<?php $ungvien_ngoaingu= App\ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->get(); 
foreach ($ungvien_ngoaingu as $key => $value) {


    ?>

    <div class="col-4">
     <p style="margin: 0px;padding-right: 0px; "> {{$value->ngoaingu->tenngoaingu}}</p>
 </div>
 <div class="col-2" style="padding-right: 0px;padding-left: 0px;">
   <p style="margin: 0px;padding-right: 0px; ">Nghe:<?php if($value->trinhdonghe==1)
   {echo "Tốt";}elseif ($value->trinhdonghe==2) {
    echo "Khá";
}elseif ($value->trinhdonghe==3) {
    echo "Trung bình";
}else{echo "Kém";}
?></p>
</div>
<div class="col-2" style="padding-right: 0px;padding-left: 0px;">
   <p style="margin: 0px;padding-right: 0px; ">Nói:<?php if($value->trinhdonoi==1)
   {echo "Tốt";}elseif ($value->trinhdonoi==2) {
    echo "Khá";
}elseif ($value->trinhdonoi==3) {
    echo "Trung bình";
}else{echo "Kém";}
?></p>
</div>
<div class="col-2" style="padding-right: 0px;padding-left: 0px;">
   <p  style="margin: 0px;padding-right: 0px; ">Đọc:<?php if($value->trinhdodoc==1)
   {echo "Tốt";}elseif ($value->trinhdodoc==2) {
    echo "Khá";
}elseif ($value->trinhdodoc==3) {
    echo "Trung bình";
}else{echo "Kém";}
?></p>
</div>
<div class="col-2" style="padding-right: 0px;padding-left: 0px;">
   <p style="margin: 0px;padding-right: 0px;">Viết:<?php if($value->trinhdoviet==1)
   {echo "Tốt";}elseif ($value->trinhdoviet==2) {
    echo "Khá";
}elseif ($value->trinhdoviet==3) {
    echo "Trung bình";
}else{echo "Kém";}
?></p>
</div>
<?php } ?>


</div>
<div class="row">
   <div class="col-12">
    <h5>Trình độ tin học</h5> <hr class="my-1">
</div>
<div class="col-3">
  <p style="margin: 0px;padding-right: 0px; ">MSWORD:<?php if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword!="")
  {
    if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==1)
    {
        echo "Tốt";
    }
    elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==2) {
        echo "Khá";
    }
    elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msword==3) {
        echo "Trung bình";
    }
    else
        {echo "Kém";}
}
?> </p>
</div>
<div class="col-3" style="padding-right: 0px;padding-left: 0px;">
   <p style="margin: 0px;padding-right: 0px; ">MSPP:<?php if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp!="")
   {
    if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==1)
    {
        echo "Tốt";
    }
    elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==2) {
        echo "Khá";
    }
    elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->mspp==3) {
        echo "Trung bình";
    }
    else
        {echo "Kém";}
}
?> </p>
</div>
<div class="col-3" style="padding-right: 0px;padding-left: 0px;">
   <p style="margin: 0px;padding-right: 0px; ">MSOUTLOOK:<?php if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook!="")
   {
    if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==1)
    {
        echo "Tốt";
    }
    elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==2) {
        echo "Khá";
    }
    elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msoutlook==3) {
        echo "Trung bình";
    }
    else
        {echo "Kém";}
}
?> </p>
</div>
<div class="col-3" style="padding-right: 0px;padding-left: 0px;">
   <p  style="margin: 0px;padding-right: 0px; ">MSEXCEL:<?php if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel!="")
   {
    if(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==1)
    {
        echo "Tốt";
    }
    elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==2) {
        echo "Khá";
    }
    elseif (Auth::guard('ungvien')->user()->trinhdotinhoc[0]->msexcel==3) {
        echo "Trung bình";
    }
    else
        {echo "Kém";}
}
?> </p>
</div>
<div class="col-12">
  <p>Phần mềm khác : <?php echo  Auth::guard('ungvien')->user()->trinhdotinhoc[0]->phanmemkhac; ?></p>
</div>

</div>
<div class="row">

    <div class="col-12">
        <h5 >Sở trường</h5>
        <hr class="my-1" >
        <p ><?php echo  Auth::guard('ungvien')->user()->kynangsotruong; ?></p>
    </div>
</div>
<div class="row">

    <div class="col-12">
        <h5 >Sở thích</h5>
        <hr class="my-1" >
        <p ><?php echo  Auth::guard('ungvien')->user()->sothich; ?></p>
    </div>
</div>
</div>
</form>
</div>

<a href="{{ url()->previous() }}" class="btn btn-primary"  role="button" style="position: fixed; bottom: 10px; right: 10px; z-index: 1;">Quay lại</a>

<a id="create_pdf"  class="btn btn-primary"  role="button" style="position: fixed; bottom: 50px; right: 10px; z-index: 1; color: white;">Xuất file PDF</a>
@endsection
@section('script')
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
<link rel="stylesheet" type="text/css" href="resume.css" media="all" />


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    (function () {
        var
        form = $('.form'),
        cache_width = form.width(),
         a4 = [595.28, 841.89]; // for a4 size paper width and height

         $('#create_pdf').on('click', function () {
            $('body').scrollTop(0);
            createPDF();
        });
        //create pdf
        function createPDF() {
            getCanvas().then(function (canvas) {
                var
                img = canvas.toDataURL("image/png"),
                doc = new jsPDF({
                   unit: 'px',
                   format: 'a4'
               });
                doc.addImage(img, 'JPEG', 20, 20);
                doc.save('bhavdip-html-to-pdf.pdf');
                form.width(cache_width);
            });
        }

        // create canvas object
        function getCanvas() {
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: true
            });
        }

    }());
</script>
<script>
    (function ($) {
        $.fn.html2canvas = function (options) {
            var date = new Date(),
            $message = null,
            timeoutTimer = false,
            timer = date.getTime();
            html2canvas.logging = options && options.logging;
            html2canvas.Preload(this[0], $.extend({
                complete: function (images) {
                    var queue = html2canvas.Parse(this[0], images, options),
                    $canvas = $(html2canvas.Renderer(queue, options)),
                    finishTime = new Date();

                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);
                    $canvas.siblings().toggle();

                    $(window).click(function () {
                        if (!$canvas.is(':visible')) {
                            $canvas.toggle().siblings().toggle();
                            throwMessage("Canvas Render visible");
                        } else {
                            $canvas.siblings().toggle();
                            $canvas.toggle();
                            throwMessage("Canvas Render hidden");
                        }
                    });
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
                }
            }, options));

            function throwMessage(msg, duration) {
                window.clearTimeout(timeoutTimer);
                timeoutTimer = window.setTimeout(function () {
                    $message.fadeOut(function () {
                        $message.remove();
                    });
                }, duration || 2000);
                if ($message)
                    $message.remove();
                $message = $('<div ></div>').html(msg).css({
                    margin: 0,
                    padding: 10,
                    background: "#000",
                    opacity: 0.7,
                    position: "fixed",
                    top: 10,
                    right: 10,
                    fontFamily: 'Tahoma',
                    color: '#fff',
                    fontSize: 12,
                    borderRadius: 12,
                    width: 'auto',
                    height: 'auto',
                    textAlign: 'center',
                    textDecoration: 'none'
                }).hide().fadeIn().appendTo('body');
            }
        };
    })(jQuery);
</script>
@endsection

