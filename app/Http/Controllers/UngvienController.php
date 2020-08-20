<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuyendung;
use App\ungvien_thanhpho;
use App\ungvien_kynang;
use App\ungvien_luu_tin;
use App\kinhnghiemlamviec;;
use App\ungvien;
use App\trinhdotinhoc;
use App\nhatuyendung;
use App\ungvien_nop_tin;
use App\ungvien_ngoaingu;
use App\trinhdobangcap;
use App\nguoithamkhao;
use DateTime;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UngvienController extends Controller
{
  public function getTintuyendunghuy($id)
  {
    ungvien_nop_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_tintuyendung',$id)->update(['id_trangthainoptin'=>4]);

    return redirect()->back()->with('alert','Đã hủy nộp hồ sơ.');
  }

  public function postDoimatkhau(Request $request)
  {

    if (!(Hash::check($request->oldpassword,Auth::guard('ungvien')->user()->matkhau))) 
      return redirect()->back()->with('alert','Mật khẩu hiện tại không khớp.');

    $this->validate($request,[
      'oldpassword'=>'required',
      'newpassword1'=>'required|min:8',
      'newpassword2'=>'required|same:newpassword1|different:oldpassword|min:8',
    ],[
      'oldpassword.required'=>'Mật khẩu không được để trống.',
      'newpassword1.required'=>'Mật khẩu không được để trống.',
      'newpassword2.required'=>'Mật khẩu không được để trống.',
      'oldpassword.min'=>'Mật khẩu tối tiểu 8 kí tự.',
      'newpassword1.min'=>'Mật khẩu tối tiểu 8 kí tự.',
      'newpassword2.min'=>'Mật khẩu tối tiểu 8 kí tự.',
      'newpassword2.same'=>'Mật khẩu mới không khớp.',
      'newpassword2.different'=>'Mật khẩu mới phải khác mật khẩu cũ.',
    ]);


    ungvien::where('id',Auth::guard('ungvien')->user()->id)->update(['matkhau'=>bcrypt($request->newpassword2)]);
    return redirect()->back()->with('alert','Đổi mật khẩu thành công');
  }

  public function postSodienthoai(Request $request)
  {
   $this->validate($request,[
    'sodienthoai'=>'required|min:10|max:10',

  ],[
    'sodienthoai.required'=>'Số điện thoại không hợp lệ.',
    'sodienthoai.min'=>'Số điện thoại không hợp lệ.',
    'sodienthoai.max'=>'Số điện thoại không hợp lệ.',

  ]);

   ungvien::where('id',Auth::guard('ungvien')->user()->id)->update(['sodienthoai'=>$request->sodienthoai]);
   return redirect()->back()->with('alert','Cập nhật thành công');
 }
 public function postAnh(Request $request)
 {

  $this->validate($request,[
    'filesTest'=>'required',

  ],[
    'filesTest.required'=>'Ảnh không hợp lệ.',

  ]);
  if($request->hasFile('filesTest'))
  {



    if (Auth::guard('ungvien')->user()->anhdaidien!=null)
    {
      unlink("upload/img/ungvien/anhdaidien/".Auth::guard('ungvien')->user()->anhdaidien);
    }


    $file=$request->filesTest;
    $name=$file->getClientOriginalName();
    $hinh=Str::random(4)."_".$name;
    while ( file_exists("upload/img/ungvien/anhdaidien/".$hinh)) {
      $hinh=Str::random(4)."_".$name;
    }
    $file->move("upload/img/ungvien/anhdaidien/",$hinh);   ungvien::where('id',Auth::guard('ungvien')->user()->id)->update(['anhdaidien'=>$hinh]);
  }

  return redirect()->back()->with('alert','Cập nhật ảnh thành công');
}
public function getNguoithamkhaoxoa($id)
{
  $nguoithamkhao=nguoithamkhao::where('id',$id)->where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();
  $nguoithamkhao[0]->delete();
  return redirect()->back()->with('alert','Xóa thành công.');
}

public function postNguoithamkhaomoi(Request $request)
{

 $this->validate($request,[
  'hoten'=>'required',
  'sodienthoai'=>'required',
  'congty'=>'required',
  'chucvu'=>'required',
  
],[
  'hoten.required'=>'Họ tên không được để trống.',
  'sodienthoai.required'=>'Số điện thoại không được để trống.',
  'congty.required'=>'Tên công ty không được để trống.',
  'chucvu.required'=>'Chức vụ không được để trống.',
]);

 $nguoithamkhao=new nguoithamkhao;
 $nguoithamkhao->hoten=$request->hoten;
 $nguoithamkhao->congty=$request->congty;
 $nguoithamkhao->sodienthoai=$request->sodienthoai;
 $nguoithamkhao->chucvu=$request->chucvu;
 $nguoithamkhao->id_ungvien=Auth::guard('ungvien')->user()->id;
 $nguoithamkhao->save();
 return redirect()->back()->with('alert','Thêm thành công.');
}
public function postNguoithamkhaosua(Request $request,$id)
{

 $this->validate($request,[
  'hoten'=>'required',
  'sodienthoai'=>'required',
  'congty'=>'required',
  'chucvu'=>'required',
  
],[
  'hoten.required'=>'Họ tên không được để trống.',
  'sodienthoai.required'=>'Số điện thoại không được để trống.',
  'congty.required'=>'Tên công ty không được để trống.',
  'chucvu.required'=>'Chức vụ không được để trống.',
]);
 $nguoithamkhao=nguoithamkhao::where('id',$id)->where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();
 $nguoithamkhao[0]->hoten=$request->hoten;
 $nguoithamkhao[0]->congty=$request->congty;
 $nguoithamkhao[0]->sodienthoai=$request->sodienthoai;
 $nguoithamkhao[0]->chucvu=$request->chucvu;
 $nguoithamkhao[0]->id_ungvien=Auth::guard('ungvien')->user()->id;
 $nguoithamkhao[0]->save();
 return redirect()->back()->with('alert','Sửa thành công.');
}
public function getTrinhdobangcapxoa($id)
{


  $trinhdobangcap=trinhdobangcap::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id',$id)->get();
  if ($trinhdobangcap[0]->anh!=null)
  {
    unlink("upload/img/ungvien/bangcap/".$trinhdobangcap[0]->anh);
  }
  $trinhdobangcap[0]->delete();
  return redirect()->back()->with('alert','Xóa thành công.');
}

public function postTrinhdobangcapmoi(Request $request)
{


  $this->validate($request,[
    'tenbangcap'=>'required',
    'truongdaotao'=>'required',
    'chuyennganh'=>'required',
    'thoigiantotnghiep'=>'required',

  ],[
    'oldpassword.required'=>'Tên bằng cấp không được để trống.',
    'truongdaotao.required'=>'Trường đào tạo không được để trống.',
    'chuyennganh.required'=>'Chuyên ngành không được để trống.',
    'thoigiantotnghiep.required'=>'Thời gian tốt nghiệp không được để trống.',

  ]);

  $trinhdobangcap=new trinhdobangcap;

  if($request->hasFile('filesTest'))
  {
    $file=$request->filesTest;
    $name=$file->getClientOriginalName();
    $hinh=Str::random(4)."_".$name;
    while (file_exists("upload/img/ungvien/bangcap/".$hinh)) {
      $hinh=Str::random(4)."_".$name;
    }
    $file->move("upload/img/ungvien/bangcap/",$hinh);  $trinhdobangcap->anh=$hinh;
  }
  $trinhdobangcap->tenbangcap=$request->tenbangcap;
  $trinhdobangcap->truongdaotao=$request->truongdaotao;
  $trinhdobangcap->chuyennganh=$request->chuyennganh;
  $trinhdobangcap->id_ungvien=Auth::guard('ungvien')->user()->id;
  $trinhdobangcap->thoigiantotnghiep=date($request->thoigiantotnghiep.'-01');

  $trinhdobangcap->save();
  return redirect()->back()->with('alert','Thêm thành công.');
  
}

public function postTrinhdobangcapsua(Request $request,$id)
{

  $this->validate($request,[
    'tenbangcap'=>'required',
    'truongdaotao'=>'required',
    'chuyennganh'=>'required',
    'thoigiantotnghiep'=>'required',

  ],[
    'oldpassword.required'=>'Tên bằng cấp không được để trống.',
    'truongdaotao.required'=>'Trường đào tạo không được để trống.',
    'chuyennganh.required'=>'Chuyên ngành không được để trống.',
    'thoigiantotnghiep.required'=>'Thời gian tốt nghiệp không được để trống.',

  ]);
  $trinhdobangcap=trinhdobangcap::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id',$id)->get();
  $trinhdobangcap[0]->tenbangcap=$request->tenbangcap;
  $trinhdobangcap[0]->truongdaotao=$request->truongdaotao;
  $trinhdobangcap[0]->chuyennganh=$request->chuyennganh;
  $trinhdobangcap[0]->id_ungvien=Auth::guard('ungvien')->user()->id;
  $trinhdobangcap[0]->thoigiantotnghiep=date($request->thoigiantotnghiep.'-01');


  if($request->hasFile('filesTestup'))
  {



    if ($trinhdobangcap[0]->anh!=null)
    {
      unlink("upload/img/ungvien/bangcap/".$trinhdobangcap[0]->anh);
    }


    $file=$request->filesTestup;
    $name=$file->getClientOriginalName();
    $hinh=Str::random(4)."_".$name;
    while ( file_exists("upload/img/ungvien/bangcap/".$hinh)) {
      $hinh=Str::random(4)."_".$name;
    }
    $file->move("upload/img/ungvien/bangcap/",$hinh);  
    echo  $trinhdobangcap[0]->anh=$hinh;
  }



  $trinhdobangcap[0]->save();
  return redirect()->back()->with('alert','Sửa thành công.');
}

public function getTrinhdongoainguxoa($id_ngoaingu)
{
  $ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$id_ngoaingu)->delete();

  return redirect()->back()->with('alert','Xóa thành công.');
}


public function postTrinhdongoaingumoi(Request $request)
{

  if(count($ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$request->ngoaingu)->get())==0)

    { $ungvien_ngoaingu=new ungvien_ngoaingu;

     $ungvien_ngoaingu->trinhdonghe=$request->trinhdonghe;
     $ungvien_ngoaingu->trinhdonoi=$request->trinhdonoi;
     $ungvien_ngoaingu->trinhdodoc=$request->trinhdodoc;
     $ungvien_ngoaingu->trinhdoviet=$request->trinhdoviet;
     $ungvien_ngoaingu->id_ngoaingu=$request->ngoaingu;
     $ungvien_ngoaingu->tenngoaingukhac=$request->ngoaingu;
     $ungvien_ngoaingu->id_ungvien=Auth::guard('ungvien')->user()->id;
     $ungvien_ngoaingu->save();
     return redirect()->back()->with('alert','Thêm thành công.');
   }

   return redirect()->back()->with('alert','Đã tồn tại.');
 }
 public function postTrinhdongoaingusua(Request $request,$id_ngoaingu)
 {


  if($request->ngoaingu==$id_ngoaingu)
  {
    $ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$id_ngoaingu)->update(['trinhdonghe'=>$request->trinhdonghe,'trinhdonoi'=>$request->trinhdonoi,'trinhdodoc'=>$request->trinhdodoc,'trinhdoviet'=>$request->trinhdoviet]);

    return redirect()->back()->with('alert','Sửa thành công.');}  



    if(count($ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$request->ngoaingu)->get())==1)


      return redirect()->back()->with('alert','Đã tồn tại.');

    $ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$id_ngoaingu)->update(['trinhdonghe'=>$request->trinhdonghe,'trinhdonoi'=>$request->trinhdonoi,'trinhdodoc'=>$request->trinhdodoc,'trinhdoviet'=>$request->trinhdoviet,'id_ngoaingu'=>$request->ngoaingu]);

    return redirect()->back()->with('alert','Sửa thành công.');
  }
  public function postTrinhdotinhoc(Request $request)
  {
    $trinhdotinhoc=trinhdotinhoc::find(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->id);

    $trinhdotinhoc->msword=$request->msword;
    $trinhdotinhoc->mspp=$request->mspp;
    $trinhdotinhoc->msoutlook=$request->msoutlook;
    $trinhdotinhoc->msexcel=$request->msexcel;
    $trinhdotinhoc->phanmemkhac=$request->phanmemkhac;

    $trinhdotinhoc->save();

    return redirect()->back()->with('alert','Cập nhật thành công.');
  }


  public function getLuuvieclam(Request $request,$id)
  {
    $timkiem=ungvien_luu_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_tintuyendung',$id)->get();

    if(count($timkiem)>0)
    {

    }
    else {
     $ungvien_luu_tin=new ungvien_luu_tin;
     $ungvien_luu_tin->id_ungvien=Auth::guard('ungvien')->user()->id;
     $ungvien_luu_tin->id_tintuyendung=$id;
     $ungvien_luu_tin->save();
   }

//echo url()->previous();
   return redirect()->back()->with('alert','Đã lưu tin tuyển dụng')->with('url',$request->url);
 }






 public function getKinhnghiemlamviecxoa($id){
  $kinhnghiemlamviec=kinhnghiemlamviec::find($id)->delete();
  return redirect()->back()->with('alert','Xóa thành công.');
}
public function postKinhnghiemlamviec(Request $request){

 $this->validate($request,[
  'tencongty'=>'required',
  'chucdanh'=>'required',
  'thoigianbatdau'=>'required',
  'mucluong'=>'required',
  'motacongviec'=>'required',


],[
  'tencongty.required'=>'Tên công ty không được để trống.',
  'chucdanh.required'=>'Chức danh không được để trống.',
  'thoigianbatdau.required'=>'Thời gian được để trống.',
  'mucluong.required'=>'Mức lương không được để trống.',
  'motacongviec.required'=>'Mô tả công việc không được để trống.',

]);
 $kinhnghiemlamviec=new kinhnghiemlamviec;
 $kinhnghiemlamviec->tencongty=$request->tencongty;
 $kinhnghiemlamviec->chucdanh=$request->chucdanh;
 $kinhnghiemlamviec->thoigianbatdau=date($request->thoigianbatdau.'-01');
 if($request->thoigianketthuc)
   $kinhnghiemlamviec->thoigianketthuc=date($request->thoigianketthuc.'-01');
 if($request->hiennay||!$request->thoigianketthuc)
   $kinhnghiemlamviec->congviechientai=1;
 $kinhnghiemlamviec->mucluong=$request->mucluong;
 $kinhnghiemlamviec->motacongviec=$request->motacongviec;
 $kinhnghiemlamviec->thanhtich=$request->thanhtich;
 $kinhnghiemlamviec->id_ungvien=Auth::guard('ungvien')->user()->id;
 $kinhnghiemlamviec->save();
 return redirect()->back()->with('alert','Thêm thành công.');

}

public function postKinhnghiemlamviecsua(Request $request,$id){


 $this->validate($request,[
  'tencongty'=>'required',
  'chucdanh'=>'required',
  'thoigianbatdau'=>'required',
  'mucluong'=>'required',
  'motacongviec'=>'required',


],[
  'tencongty.required'=>'Tên công ty không được để trống.',
  'chucdanh.required'=>'Chức danh không được để trống.',
  'thoigianbatdau.required'=>'Thời gian được để trống.',
  'mucluong.required'=>'Mức lương không được để trống.',
  'motacongviec.required'=>'Mô tả công việc không được để trống.',

]);
 $kinhnghiemlamviec=kinhnghiemlamviec::find($id);
 $kinhnghiemlamviec->tencongty=$request->tencongty;
 $kinhnghiemlamviec->chucdanh=$request->chucdanh;
 $kinhnghiemlamviec->thoigianbatdau=date($request->thoigianbatdau.'-01');
 if($request->thoigianketthuc)
   $kinhnghiemlamviec->thoigianketthuc=date($request->thoigianketthuc.'-01');
 if($request->hiennay||!$request->thoigianketthuc)
   $kinhnghiemlamviec->congviechientai=1;

 $kinhnghiemlamviec->mucluong=$request->mucluong;
 $kinhnghiemlamviec->motacongviec=$request->motacongviec;
 $kinhnghiemlamviec->thanhtich=$request->thanhtich;
 $kinhnghiemlamviec->save();

 return redirect()->back()->with('alert','Cập nhật thành công.');



}
public function postKhac(Request $request)
{

 $ungvien=ungvien::find(Auth::guard('ungvien')->user()->id);

 $ungvien->muctieu=$request->muctieu;
 $ungvien->kynangsotruong=$request->kynangsotruong;

 $ungvien->sothich=$request->sothich;
 $ungvien->save();
 return redirect()->back()->with('alert','Cập nhật thành công.');
}

public function postHoso(Request $request){





  $ungvien=ungvien::find(Auth::guard('ungvien')->user()->id);

  $ungvien->vitrimongmuon=$request->vitrimongmuon;
  $ungvien->mucluongmongmuon=$request->mucluongmongmuon;
  if($request->nganhnghe!=$ungvien->id_nganhnghe)
   $ungvien_kynang=ungvien_kynang::where('id_ungvien',Auth::guard('ungvien')->user()->id)->delete();
 if($request->kynang!=null)
 { 
  $ungvien_kynang=ungvien_kynang::where('id_ungvien',Auth::guard('ungvien')->user()->id)->delete();
  foreach (  $request->kynang as $key => $value) {

   $ungvien_kynang=new ungvien_kynang;
   $ungvien_kynang->id_ungvien=Auth::guard('ungvien')->user()->id;
   $ungvien_kynang->id_kynang=$value;
   $ungvien_kynang->save();
 }
}
$ungvien->id_nganhnghe=$request->nganhnghe;

$ungvien->id_capbac=$request->capbac;
$ungvien->id_hinhthuclamviec=$request->hinhthuclamviec;
$ungvien->id_kinhnghiem=$request->kinhnghiem;
$ungvien->id_trinhdo=$request->trinhdo;

$ungvien->save();
if($request->thanhpho!=null)
{
  $ungvien_thanhpho=ungvien_thanhpho::where('id_ungvien',Auth::guard('ungvien')->user()->id)->delete();

  foreach (  $request->thanhpho as $key => $value) {

   $ungvien_thanhpho=new ungvien_thanhpho;
   $ungvien_thanhpho->id_ungvien=Auth::guard('ungvien')->user()->id;
   $ungvien_thanhpho->id_thanhpho=$value;
   $ungvien_thanhpho->save();
 }
}

return redirect()->back()->with('alert','Cập nhật thành công.');

}
public function getHoso(){


  $data=ungvien::findOrFail(Auth::guard('ungvien')->user()->id);

  return view('ungvien.hoso',['data'=>$data]);
}
public function getThoat(){
  Auth::guard('ungvien')->logout();
  return redirect('timkiemviec');
}

public function getNhatuyendung($id)
{

  $data=nhatuyendung::find($id);
  return view('ungvien.danhsachtinnhatuyendung',['data'=>$data]);

}

public function getNophoso($id){

  $today = date("Y-m-d");
  $expire =tintuyendung::findOrFail($id)->hannophoso;
  $today_dt =  new DateTime(date("Y-m-d",mktime(0, 0, 0, date("m")-1, date("d"), date("Y"))));
  $expire_dt = new DateTime($expire);

  if ($expire_dt < $today_dt||tintuyendung::findOrFail($id)->trangthai!=1)
    return redirect()->back()->with('success','Nộp hồ sơ thất bại.');


  $timkiem=ungvien_nop_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_tintuyendung',$id)->get();

  if(count($timkiem)>0)
  {

  }
  else {

    if(Auth::guard('ungvien')->user()->id_nganhnghe=="")
      return redirect()->back()->with('success','Chưa cập nhật hồ sơ.');





    $ungvien_nop_tin=new ungvien_nop_tin;
    $ungvien_nop_tin->id_ungvien=Auth::guard('ungvien')->user()->id;
    $ungvien_nop_tin->id_tintuyendung=$id;
    $ungvien_nop_tin->save();
  }


  return redirect()->back()->with('success','Đã nộp hồ sơ.');

}
public function postThongtincanhan(Request $request)
{


 $this->validate($request,[
  'hoten'=>'required|max:255',
  'ngaysinh'=>'required',
  'diachi'=>'required|max:255',
  'thanhpho'=>'required',

],[
  'hoten.required'=>'Tên không được để trống.',
  'hoten.max'=>'Tên tối đa 255 ký tự.',
  'diachi.required'=>'Địa chỉ không được để trống.',
  'diachi.max'=>'Địa chỉ tối đa 255 ký tự.',

]);

 $ungvien=ungvien::find(Auth::guard('ungvien')->user()->id);
 echo $ungvien->hoten=$request->hoten;
 echo $ungvien->ngaysinh=$request->ngaysinh;
 echo $ungvien->diachi=$request->diachi;
 echo $ungvien->id_thanhpho=$request->thanhpho;
 echo $ungvien->gioitinh=$request->gioitinh;
 echo $ungvien->tinhtranghonnhan=$request->tinhtranghonnhan;



 $ungvien->save();

 return redirect('ungvien/quanlytaikhoan');

}


public function getTintuyendungdanop()
{

  $dstintuyendung=ungvien_nop_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();

  return  view('ungvien.tintuyendungdanop',['data'=>$dstintuyendung]);

}

public function getTintuyendungluu()
{

  $dstintuyendung=ungvien_luu_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();

  return  view('ungvien.tintuyendungluu',['data'=>$dstintuyendung]);

}

public function postDangnhap(Request $request)
{


 $arr = [
  'email' => $request->email,
  'password' => $request->password,
];

if (Auth::guard('ungvien')->attempt($arr)) {

  if(Auth::guard('ungvien')->user()->trangthai!=1)
  {
    Auth::guard('ungvien')->logout();
    return redirect()->back()->with('alert','Tài khoản bị khóa.');
  }
  return redirect()->back();
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
}

else {
 return redirect()->back()->with('alert','Đăng nhập không thành công.');

}
}

public function postDangky(Request $request)
{


  $this->validate($request,[
    'hoten'=>'required|max:255',
    'email'=>'required|max:255|email|unique:ungvien,email',
    'sodienthoai'=>'required|max:10|min:10',
    'matkhau1'=>'required|max:255|min:8',
    'matkhau2'=>'required|same:matkhau1',

  ],[
    'hoten.required'=>'Tên không được để trống.',
    'hoten.max'=>'Tên tối đa 255 ký tự.',
    'email.required'=>'Email không được để trống.',
    'email.max'=>'Email tối đa 255 ký tự.',
    'email.email'=>'Email không hợp lệ.',
    'email.unique'=>'Đã tồn tại email',
    'sodienthoai.required'=>'Số điện thoại không được để trống.',
    'sodienthoai.max'=>'Số điện thoại không hợp lệ.',
    'sodienthoai.min'=>'Số điện thoại không hợp lệ.',
    'matkhau1.max'=>'Mật khẩu không hợp lệ.',
    'matkhau1.min'=>'Mật khẩu không hợp lệ.',
    'matkhau1.required'=>'Mật khẩu không hợp lệ.',
    'matkhau2.same'=>'Mật khẩu không khớp.',


  ]);

  $ungvien=new ungvien;
  $ungvien->hoten=$request->hoten;
  $ungvien->matkhau=bcrypt($request->matkhau2);
  $ungvien->sodienthoai=$request->sodienthoai;
  $ungvien->email=$request->email;
  $ungvien->ngaytaohoso=new DateTime;
  $ungvien->save();

  $trinhdotinhoc=new trinhdotinhoc;
  $trinhdotinhoc->id_ungvien=$ungvien->id;
  $trinhdotinhoc->save();

  $arr = [
    'email' => $request->email,
    'password' => $request->matkhau2,
  ];
  if (Auth::guard('ungvien')->attempt($arr)) {

   return redirect()->back();
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
 }



}

public function getQuanlytaikhoan(){

 return view('ungvien.quanlytaikhoan');
}

public function getTimkiemviec()
{

 $kq=[];
 $kq2=[];
 if(!isset($_GET['nganhnghe'])&&!isset($_GET['tencongviec'])&&!isset($_GET['trinhdo'])&&!isset($_GET['thanhpho'])&&!isset($_GET['kinhnghiem'])&&!isset($_GET['hinhthuclamviec'])&&!isset($_GET['mucluong'])) 
 {


  if(Auth::guard('ungvien')->check()&&Auth::guard('ungvien')->user()->id_nganhnghe!=null)
  {
    $data=tintuyendung::where('id_nganhnghe',Auth::guard('ungvien')->user()->id_nganhnghe)->where('trangthai',1)->where('hannophoso','>',new DateTime())->get();

    $kynangcuaungvien=array();
    $datax=array();
    foreach (Auth::guard('ungvien')->user()->ungvien_kynang as $key => $value) 
    {
     array_push($kynangcuaungvien,$value->id);
   }

//   var_dump($kynangcuaungvien);



   foreach ($data as $key1 => $value1)
   {
    $kynangcuatintuyendung=array();
    foreach ($value1->kynang as $key2 => $value2) 
    { 
     array_push($kynangcuatintuyendung,$value2->id);
    // echo $value2->id;


   }
//printf($value1);
   $dataend=array();
   $datax[count(array_intersect($kynangcuaungvien,$kynangcuatintuyendung))][]=$value1;
   // var_dump($kynangcuatintuyendung);
   // echo $key1; var_dump(array_intersect($kynangcuaungvien,$kynangcuatintuyendung));
//  echo count(array_intersect($kynangcuaungvien,$kynangcuatintuyendung));
 }

//var_dump($datax);
 for ($i=0; $i <= count($kynangcuaungvien) ; $i++) { 
  if(isset($datax[$i]))
    foreach ($datax[$i] as $key => $value) {
      $dataend[]=$value;
    }
  }
  $data = array_reverse($dataend);
} 
else
  $data=tintuyendung::where('trangthai',1)->where('hannophoso','>',new DateTime())->get();

if(Auth::guard('ungvien')->check())
  return view('ungvien.timkiemviec',['data'=>$data,'alert'=>'Công Việc Phù Hợp']);
else
  return view('ungvien.timkiemviec',['data'=>$data,'alert'=>'Công Việc Hiện Có']);
}


$tintuyendung=tintuyendung::query();


if(isset($_GET['hinhthuclamviec']))
{
  $tintuyendung->when($_GET['hinhthuclamviec']!="",function($q)
  {
   return $q->where('id_hinhthuclamviec','=',$_GET['hinhthuclamviec']);
 });
}

if(isset($_GET['tencongviec']))
{
  $tintuyendung->when($_GET['tencongviec']!="",function($q)
  {
   return $q->where('tieudetuyendung','like','%'.$_GET['tencongviec'].'%');
 });
}

if(isset($_GET['trinhdo']))
{
  $tintuyendung->when($_GET['trinhdo']!="",function($q)
  {
   return $q->where('id_trinhdo',$_GET['trinhdo']);
 });
}


if (isset($_GET['mucluong'])) 
{

$tintuyendung->when($_GET['mucluong']!="",function($q)
  {
   return $q->where('id_mucluong',$_GET['mucluong']);
 });

}

if (isset($_GET['kinhnghiem'])) 
{
 $tintuyendung->when($_GET['kinhnghiem']!="",function($q)
  {
   return $q->where('id_kinhnghiem',$_GET['kinhnghiem']);
 });
}

if(isset($_GET['nganhnghe']))
{
  $tintuyendung->when($_GET['nganhnghe']!="",function($q)
  {
   return $q->where('id_nganhnghe','=',$_GET['nganhnghe']);
 });
}


if($tintuyendung==tintuyendung::query())
{

  $tintuyendung=tintuyendung::where('trangthai',1)->where('hannophoso','>',new DateTime())->get();

}
else
{
  $tintuyendung=$tintuyendung->where('trangthai',1)->where('hannophoso','>',new DateTime())->get();

  if (isset($_GET['kynang'])) 
  {
    $dskynang=[];

    foreach ($_GET['kynang'] as $key => $value) 
    {

     array_push($dskynang,$value);
   } 
   
   $datax=array();

   foreach ($tintuyendung as $key1 => $value1)
   {
    $kynangcuatintuyendung=array();
    foreach ($value1->kynang as $key2 => $value2) 
    { 
     array_push($kynangcuatintuyendung,$value2->id);
   }

   $dataend=array();
   $datax[count(array_intersect($dskynang,$kynangcuatintuyendung))][]=$value1;

 }

 for ($i=0; $i <= count($dskynang) ; $i++) { 
  if(isset($datax[$i]))
    foreach ($datax[$i] as $key => $value) {
      $dataend[]=$value;
    }
  }
  $tintuyendung = array_reverse($dataend);
}

}

if (isset($_GET['thanhpho'])&&$_GET['thanhpho']!="")
{

 foreach ($tintuyendung as $key => $value)
 { 
  $x=$value->dsthanhpho;
  foreach ($x as $key1 => $value1) 
  {
   if($value1['id_thanhpho']==$_GET['thanhpho'])
   { 
    array_push($kq,$value);
    break;
    
  }
}
}
}
else{
  $kq=$tintuyendung;
}

return view('ungvien.timkiemviec',['data'=>$kq]);

}





public function getTintuyendung($id)
{	
 $tintuyendung=tintuyendung::find($id);


 return view('ungvien.tintuyendung',['data'=>$tintuyendung]);
}
public function test()
{
 return view('ungvien.test');
}
}
