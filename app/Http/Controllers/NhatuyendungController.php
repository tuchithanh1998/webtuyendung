<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\nhatuyendung;
use App\tintuyendung;
use App\tintuyendung_kynang;
use App\tintuyendung_thanhpho;
use App\ungvien_nop_tin;
use App\ungvien;
use App\mucluong;
use App\nhatuyendung_luu_ungvien;
use DateTime;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class NhatuyendungController extends Controller
{

public function getMatkhau($token)
   {

     $nhatuyendung=nhatuyendung::where('token',$token)->firstOrFail();
     if($nhatuyendung)
     {
      $password=Str::random(8);
      $nhatuyendung->matkhau=bcrypt($password);
      $nhatuyendung->token= hash_hmac('sha256', Str::random(40), config('app.key'));
      $nhatuyendung->save();
      return redirect('nha-tuyen-dung')->with('password','Mật khẩu mới là : '.$password);
    }
    else
    {
     return redirect('nha-tuyen-dung');
   }
 }
	public function postQuenmatkhau(Request $request)
    {

      $this->validate($request,[

        'email'=>'required|max:255|email',


      ],[

        'email.required'=>'Email không được để trống.',
        'email.max'=>'Email tối đa 255 ký tự.',
        'email.email'=>'Email không hợp lệ.',




      ]);
      $nhatuyendung=nhatuyendung::where('email',$request->email)->firstOrFail();
      if($nhatuyendung)
      {
        $nhatuyendung->token=hash_hmac('sha256', Str::random(40), config('app.key'));
        $nhatuyendung->save();
        $data=[
          'name'=> $nhatuyendung->tencongty,    
          'quenmatkhau_link'=>route('nhatuyendung.quenmatkhau',$nhatuyendung->token),
        ];
   //   $data->activation_link=route('user.activate',$ungvien->matkhau);
        \Mail::to($nhatuyendung->email)->send(new \App\Mail\MailQuenmatkhaunhatuyendung($data));
 return redirect()->back()->with('alert','Mật khẩu mới đã được gửi vào mail.');
      }
      else
      {
       return redirect()->back()->with('alert','Email chưa đăng ký.');
     }
   }

	public function getXoaungviendaluu($id)
	{
		if(nhatuyendung_luu_ungvien::where('id_ungvien',$id)->where('id_nhatuyendung',Auth::guard('nhatuyendung')->user()->id)->first()!="")
			{	nhatuyendung_luu_ungvien::where('id_ungvien',$id)->where('id_nhatuyendung',Auth::guard('nhatuyendung')->user()->id)->delete();
		return redirect()->back()->with('alert','Xóa thành công.');
	}
	return redirect()->back()->with('alert','Không tồn tại.');
}
public function getUngviendaluu()
{
		//$data=nhatuyendung_luu_ungvien::where('id_nhatuyendung',Auth::guard('nhatuyendung')->user()->id)->get();
	$data=	Auth::guard('nhatuyendung')->user()->luuungvien;

	foreach ($data as $key => $value) {
     if($value->ungvien->trangthai!=1)
        unset($data[$key]);
   }
	return view('nhatuyendung.ungviendaluu',['data'=>$data]);
}

public function getNhatuyendungluuungvien($id)
{
	if(nhatuyendung_luu_ungvien::where('id_ungvien',$id)->where('id_nhatuyendung',Auth::guard('nhatuyendung')->user()->id)->first()=="")
		{	$x=new nhatuyendung_luu_ungvien;
			$x->id_ungvien=$id;
			$x->id_nhatuyendung=Auth::guard('nhatuyendung')->user()->id;
			$x->save();
			return redirect()->back()->with('alert','Thêm thành công.');
		}
		return redirect()->back()->with('alert','Đã tồn tại.');
	}
	public function postThongtinnguoilienhe(Request $request)
	{
		$this->validate($request,[

			'tennguoilienhe'=>'required',
			'diachilienhe'=>'required',
			'sodienthoailienhe'=>'required|max:10|min:10',
			'emaillienhe'=>'required|email',
		],[
			'tennguoilienhe.required'=>'Tên  không được để trống.',
			'diachilienhe.required'=>'Địa chỉ không được để trống.',
			'sodienthoailienhe.required'=>'Số điện thoại không được để trống.',
			'sodienthoailienhe.max'=>'Số điện thoại không hợp lệ.',
			'sodienthoailienhe.min'=>'Số điện thoại không hợp lệ.',
			'emaillienhe.required'=>'Email không được để trống.',
			'emaillienhe.email'=>'Email không hợp lệ.',


			

		]);
		$data=nhatuyendung::find(Auth::guard('nhatuyendung')->user()->id)->update(['tennguoilienhe'=>$request->tennguoilienhe,'diachilienhe'=>$request->diachilienhe,'sodienthoailienhe'=>$request->sodienthoailienhe,'emaillienhe'=>$request->emaillienhe]);

		return redirect()->back()->with('alert','Sửa thành công.');
	}

	public function postThongtincongty(Request $request)
	{

		$this->validate($request,[

			'tencongty'=>'required',
			'diachicongty'=>'required',
			'thanhpho'=>'required',
			'sodienthoai'=>'required',

			'quymo'=>'required',



		],[
			'tencongty.required'=>'Tên công ty không được để trống.',
			'diachicongty.required'=>'Địa chỉ không được để trống.',
			'thanhpho.required'=>'Thành phố không được để trống.',
			'sodienthoai.required'=>'Số điện thoại không được để trống.',

			'quymo.required'=>'Quy mô nhân sự không được để trống.',

		]);
		if($request->hasFile('filesTest'))
		{



			if (Auth::guard('nhatuyendung')->user()->logo!=null)
			{
				unlink("upload/img/nhatuyendung/logo/".Auth::guard('nhatuyendung')->user()->logo);
			}


			$file=$request->filesTest;
			$name=$file->getClientOriginalName();
			$hinh=Str::random(4)."_".$name;
			while ( file_exists("upload/img/nhatuyendung/logo/".$hinh)) {
				$hinh=Str::random(4)."_".$name;
			}
			$file->move("upload/img/nhatuyendung/logo/",$hinh);  
		}
		else{
			$hinh=Auth::guard('nhatuyendung')->user()->logo;
		}

		nhatuyendung::where('id',Auth::guard('nhatuyendung')->user()->id)->update(['tencongty'=>$request->tencongty,'diachicongty'=>$request->diachicongty,'id_thanhpho'=>$request->thanhpho,'sodienthoai'=>$request->sodienthoai,'gioithieu'=>$request->gioithieu,'id_quymonhansu'=>$request->quymo,'websitecongty'=>$request->websitecongty,'logo'=>$hinh]);


		return redirect()->back();
	}
	public function getHuyTintuyendung($id_tintuyendung)
	{
		$tintuyendung=tintuyendung::where('id',$id_tintuyendung)->where('id_nhatuyendung',Auth::guard('nhatuyendung')->user()->id)->update(['trangthai'=>2]);
		return redirect()->back();
	}

	public function getTintuyendung($id_tintuyendung)
	{
		$tintuyendung=tintuyendung::where('id',$id_tintuyendung)->where('id_nhatuyendung',Auth::guard('nhatuyendung')->user()->id)->get();

		return view('nhatuyendung.tintuyendung',['data'=>$tintuyendung[0]]);
	}

	public function postDoimatkhau(Request $request)
	{

		if (!(Hash::check($request->oldpassword,Auth::guard('nhatuyendung')->user()->matkhau))) 
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


		nhatuyendung::where('id',Auth::guard('nhatuyendung')->user()->id)->update(['matkhau'=>bcrypt($request->newpassword2)]);
		return redirect()->back()->with('alert','Đổi mật khẩu thành công.');

	}
	public function getUngvien($id_ungvien)
	{
	//	$data=ungvien::findOrFail($id_ungvien);
		$data=ungvien::where('trangthai',1)->where('id_nganhnghe','>',0)->where('xacthuc',1)->where('id_thanhpho','<>','')->where('id',$id_ungvien)->firstOrFail();
		return view('nhatuyendung.ungvien',['data'=>$data]);
	}
	public function getTimungvien()
	{

		$ungvien=ungvien::query();

		if(isset($_GET['nganhnghe']))
		{
			$ungvien->when($_GET['nganhnghe']!="",function($q)
			{
				return $q->where('id_nganhnghe','=',$_GET['nganhnghe']);
			});
		}


		if(isset($_GET['trinhdo']))
		{
			$ungvien->when($_GET['trinhdo']!="",function($q)
			{
				return $q->where('id_trinhdo','=',$_GET['trinhdo']);
			});
		}
		if(isset($_GET['capbac']))
		{
			$ungvien->when($_GET['capbac']!="",function($q)
			{
				return $q->where('id_capbac','=',$_GET['capbac']);
			});
		}
		if(isset($_GET['hinhthuclamviec']))
		{
			$ungvien->when($_GET['hinhthuclamviec']!="",function($q)
			{
				return $q->where('id_hinhthuclamviec','=',$_GET['hinhthuclamviec']);
			});
		}
		if(isset($_GET['thanhpho'])&&$_GET['thanhpho']!="")
		{

			$ungvien->join('ungvien_thanhpho',
				'ungvien.id','=','ungvien_thanhpho.id_ungvien')->where('ungvien_thanhpho.id_thanhpho',$_GET['thanhpho']);

		}


		if (isset($_GET['kinhnghiem'])) 
		{
			$dskinhnghiem=[];

			foreach ($_GET['kinhnghiem'] as $key => $value) 
			{

				array_push($dskinhnghiem,$value);
			} 
			$ungvien->whereIn('id_kinhnghiem',$dskinhnghiem);
		}
		if (isset($_GET['mucluong'])) 
		{

			$ungvien->when($_GET['mucluong']!="",function($q)
			{
				$mucluong=mucluong::findOrFail($_GET['mucluong']);
				return $q->WhereBetween('mucluongmongmuon',[$mucluong->mucluong1,$mucluong->mucluong2]);
			});

		}
		if (isset($_GET['kynang'])) 
		{
			$dskynang=[];

			foreach ($_GET['kynang'] as $key => $value) 
			{

				array_push($dskynang,$value);
			} 
			$ungvien->join('ungvien_kynang', 'ungvien.id', '=', 'ungvien_kynang.id_ungvien')
			->whereIn('ungvien_kynang.id_kynang',$dskynang);
		}





		if($ungvien==ungvien::query())
		{

			$ungvien=ungvien::where('timkiem',1)->where('trangthai',1)->where('id_nganhnghe','>',0)->where('xacthuc',1)->where('id_thanhpho','<>','')->get();

		}
		else
		{
			$ungvien=$ungvien->where('timkiem',1)->where('trangthai',1)->where('id_nganhnghe','>',0)->where('xacthuc',1)->where('id_thanhpho','<>','')->get();
		}
		return view('nhatuyendung.timungvien',['data'=>$ungvien]);
	}
	public function postTrangthaiungviennoptin(Request $request,$id_tintuyendung,$id_ungvien)
	{
		ungvien_nop_tin::where('id_tintuyendung',$id_tintuyendung)->where('id_ungvien',$id_ungvien)->update(['id_trangthainoptin'=>$request->trangthaiRadios]);
		return redirect()->back();
	}

	public function getDanhsachungvien($id)
	{


//	$tintuyendung=tintuyendung::where('id',$id)->where('nhatuyendung',Auth::guard('nhatuyendung')->user()->id)->first();
		$data=ungvien_nop_tin::where('id_tintuyendung',$id)->get();

		foreach ($data as $key => $value) {
     if($value->ungvien->trangthai!=1)
        unset($data[$key]);
   }
		return view('nhatuyendung.ungviennoptin',['data'=>$data]);
	}
	public function getDangtintuyendung(){
		return view('nhatuyendung.dangtintuyendung');
	}
	public function postDangtintuyendung(Request $request)
	{
		$test=	$this->validate($request,[			
			'tieudetuyendung'=>'required',
			'soluongcantuyen'=>'required|integer|between:1,50',
			'dotuoi'=>'required',
			'motacongviec'=>'required',	
			'quyenloi'=>'required',
			'thanhpho'=>'required',
		//	'kynang'=>'required',
			'gioitinh'=>'required',
			'kinhnghiem'=>'required',
			'hannophoso'=>'required',
			'capbac'=>'required',
			'nganhnghe'=>'required',
			'hinhthuclamviec'=>'required',
			'mucluong'=>'required',
			'trinhdo'=>'required',
		],[

			'tieudetuyendung.required'=>'Tiêu đề tuyển dụng không được để trống.',
			'soluongcantuyen.required'=>'Số lượng cần tuyển không được để trống.',
			'soluongcantuyen.between'=>'Số lượng tuyển dụng tối thiểu 1 tối đa 50.',
			'dotuoi.required'=>'Độ tuổi không được để trống.',
			'quyenloi.required'=>'Quyển lợi không được để trống',		
			'motacongviec.required'=>'Mô tả công việc không được để trống',
			'thanhpho.required'=>'Thành phố không được để trống.',		
			'gioitinh.required'=>'Giới tính không được để trống.',
			'kinhnghiem.required'=>'Kinh nghiệm không được để trống.',
			'hannophoso.required'=>'Hạn nộp hồ sơ không được để trống.',
			'capbac.required'=>'Cấp bậc không được để trống.',
			'nganhnghe.required'=>'Ngành nghề không được để trống.',
			'hinhthuclamviec.required'=>'Hình thức làm việc không được để trống.',
			'mucluong.required'=>'Mức lương không được để trống được để trống.',
			'trinhdo.required'=>'Trình độ bằng cấp không được để trống.',


		]);

		if($test)
		{

		}
		else
		{
			return redirect()->back()->withInput();
		}

		$tintuyendung=new tintuyendung;
		$tintuyendung->tieudetuyendung=$request->tieudetuyendung;
		$tintuyendung->soluongcantuyen=$request->soluongcantuyen;
		$tintuyendung->dotuoi=$request->dotuoi;
		$tintuyendung->gioitinh=$request->gioitinh;
		$tintuyendung->id_kinhnghiem=$request->kinhnghiem;
		$tintuyendung->motacongviec=nl2br($request->motacongviec);
		$tintuyendung->quyenloi=nl2br($request->quyenloi);
		$tintuyendung->yeucaukhac=nl2br($request->yeucaukhac);
		$date=new DateTime();
		$tintuyendung->hannophoso=$date->modify('+'.$request->hannophoso.' day');
		$tintuyendung->id_capbac=$request->capbac;
		$tintuyendung->id_nganhnghe=$request->nganhnghe;
		$tintuyendung->id_hinhthuclamviec=$request->hinhthuclamviec;
		$tintuyendung->id_mucluong=$request->mucluong;
		$tintuyendung->id_trinhdo=$request->trinhdo;
		$tintuyendung->ngaydangtin=new DateTime();
		$tintuyendung->id_nhatuyendung=	Auth::guard('nhatuyendung')->user()->id;
		$tintuyendung->save();
		if($request->kynang!=null)
			foreach ($request->kynang as $key => $value) {
				$tintuyendung_kynang=new tintuyendung_kynang;
				$tintuyendung_kynang->id_tintuyendung=$tintuyendung->id;
				$tintuyendung_kynang->id_kynang=$value;
				$tintuyendung_kynang->save();
			}


			foreach ($request->thanhpho as $key => $value) {
				$tintuyendung_thanhpho=new tintuyendung_thanhpho;
				$tintuyendung_thanhpho->id_tintuyendung=$tintuyendung->id;
				$tintuyendung_thanhpho->id_thanhpho=$value;
				$tintuyendung_thanhpho->save();
			}


/*$ungvien=ungvien::query();

	$ungvien->when($request->gioitinh!=3,function($q)
  {
   return $q->where('gioitinh','=',$request->gioitinh);
   });



$ungvien=$ungvien::where('timkiem',1)->where('trangthai',1)->where('id_nganhnghe',$request->nganhnghe)->where('id_hinhthuclamviec',$request->hinhthuclamviec)->get();*/


			return redirect()->back()->with('alert','Đăng tin tuyển dụng thành công.');

/*foreach ($request->kynang as $key => $value) {
	
	echo $value;
}
foreach ($request->thanhpho as $key => $value) {
	
	echo $value;
}
		var_dump($request->kynang);
		var_dump($request->thanhpho);*/

	}
	public function getThoat(){
		Auth::guard('nhatuyendung')->logout();
		return redirect('nha-tuyen-dung');
	}
	public function getDangky(){
		if(Auth::guard('nhatuyendung')->check())
			return redirect('nhatuyendung/quanlytaikhoan');
		return view('nhatuyendung.dangky');

	}

	public function getTindadang(){
		return view('nhatuyendung.tindadang');
	}
	public function postDangky(Request $request){

		$test=	$this->validate($request,[
			'email'=>'required|max:255|email|unique:nhatuyendung,email',
			'matkhau1'=>'required|max:255|min:8',
			'matkhau2'=>'required|max:255|min:8|same:matkhau1',
			'tencongty'=>'required|max:255',
			'diachicongty'=>'required|max:255',
			'thanhpho'=>'required',
			'sodienthoai'=>'required|max:10|min:10',
			'gioithieu'=>'required|min:1|max:1000',
			'quymo'=>'required',
			'websitecongty'=>'max:255',
			'tennguoilienhe'=>'required|max:255',
			'diachilienhe'=>'required|max:255',
			'sodienthoailienhe'=>'required|max:10|min:10',
			'emaillienhe'=>'required|max:255|email',
			
		],[
			
			'email.required'=>'Email không được để trống.',
			'email.max'=>'Email không hợp lệ.',
			'email.email'=>'Email không hợp lệ.',
			'email.unique'=>'Email đã được đăng ký.',

			'emaillienhe.required'=>'Email không được để trống.',
			'emaillienhe.max'=>'Email không hợp lệ.',
			'emaillienhe.email'=>'Email không hợp lệ.',


			'matkhau1.required'=>'Mật khẩu không được để trống.',
			'matkhau1.max'=>'Mật khẩu không hợp lệ.',
			'matkhau1.min'=>'Mật khẩu không hợp lệ.',


			'matkhau2.required'=>'Mật khẩu không được để trống.',
			'matkhau2.max'=>'Mật khẩu không hợp lệ.',
			'matkhau2.min'=>'Mật khẩu không hợp lệ.',
			'matkhau2.same'=>'Mật khẩu nhập lại phải giống nhau.',


			'gioithieu.required'=>'Giới thiệu không được để trống.',
			'gioithieu.max'=>'Giới thiệu không hợp lệ.',
			'gioithieu.min'=>'Giới thiệu không hợp lệ.',

			'tencongty.required'=>'Tên công ty không được để trống.',
			'tencongty.max'=>'Tên công ty không hợp lệ.',

			'diachicongty.required'=>'Địa chỉ công ty không được để trống.',
			'diachicongty.max'=>'Địa chỉ công ty không hợp lệ.',

			'thanhpho.required'=>'Thành phố không được để trống.',

			'sodienthoai.required'=>'Số điện thoại không được để trống.',
			'sodienthoai.max'=>'Số điện thoại không hợp lệ.',
			'sodienthoai.min'=>'Số điện thoại không hợp lệ.',

			'websitecongty.max'=>'Website công ty không hợp lệ.',

			'diachilienhe.required'=>'Địa chỉ không được để trống.',
			'diachilienhe.max'=>'Địa chỉ thoại không hợp lệ.',

			'tennguoilienhe.required'=>'Tên người liên hệ không được để trống.',
			'tennguoilienhe.max'=>'Tên người liên hệ không hợp lệ.',

			'sodienthoailienhe.required'=>'Số điện thoại không được để trống.',
			'sodienthoailienhe.max'=>'Số điện thoại không hợp lệ.',
			'sodienthoailienhe.min'=>'Số điện thoại không hợp lệ.',

		]);

		if($test)
		{

		}
		else
		{
			return redirect()->back()->withInput();
		}

if($request->hasFile('filesTest'))
		{

			$file=$request->filesTest;
			$name=$file->getClientOriginalName();
			$hinh=Str::random(4)."_".$name;
			while ( file_exists("upload/img/nhatuyendung/logo/".$hinh)) {
				$hinh=Str::random(4)."_".$name;
			}
			$file->move("upload/img/nhatuyendung/logo/",$hinh);  
		}
		$nhatuyendung=new nhatuyendung;
		$nhatuyendung->email=$request->email;
		$nhatuyendung->matkhau=bcrypt($request->matkhau2);
		$nhatuyendung->tencongty=$request->tencongty;
		$nhatuyendung->diachicongty=$request->diachicongty;
		$nhatuyendung->id_thanhpho=$request->thanhpho;
		$nhatuyendung->sodienthoai=$request->sodienthoai;
		$nhatuyendung->id_quymonhansu=$request->quymo;
		$nhatuyendung->websitecongty=$request->websitecongty;
		$nhatuyendung->tennguoilienhe=$request->tennguoilienhe;
		$nhatuyendung->diachilienhe=$request->diachilienhe;
		$nhatuyendung->sodienthoailienhe=$request->sodienthoailienhe;
		$nhatuyendung->emaillienhe=$request->emaillienhe;
		if($request->hasFile('filesTest'))
		{
		$nhatuyendung->logo=$hinh;}
		$nhatuyendung->gioithieu=$request->gioithieu;
		  $nhatuyendung->token= hash_hmac('sha256', Str::random(40), config('app.key'));
		$nhatuyendung->ngaytao=new DateTime();

		$nhatuyendung->save();

		$arr = [
			'email' => $request->email,
			'password' => $request->matkhau2,
		];

		

	/*	if (Auth::guard('nhatuyendung')->attempt($arr)) {

			return redirect('nhatuyendung/quanlytaikhoan');
           
		}*/


		 $data=[
        'name'=> $nhatuyendung->tencongty,    
        'activation_link'=>route('nhatuyendung.activate',$nhatuyendung->token),
      ];
   //   $data->activation_link=route('user.activate',$ungvien->matkhau);
      \Mail::to($nhatuyendung->email)->send(new \App\Mail\Mailnhatuyendung($data));




      return redirect()->back()->with('alert','Đăng ký thành công xác thực mail để sử dụng.');
    }


		
	 public function getXacthuc($token)
 {

  nhatuyendung::where('token',$token)->update(['xacthuc'=>1,'token'=>hash_hmac('sha256', Str::random(40), config('app.key'))]);

  return redirect('nha-tuyen-dung')->with('alert','Xác thực mail thành công.');
}


	public function getQuanlytaikhoan()
	{
		
		return view('nhatuyendung.quanlytaikhoan');

	}
	public function postDangnhap(Request $request){
		$arr = [
			'email' => $request->email,
			'password' => $request->password,
		];


		if ($request->remember == trans('remember.Remember Me')) {
			$remember = true;
		} else {
			$remember = false;
		}
        //kiểm tra trường remember có được chọn hay không

		if (Auth::guard('nhatuyendung')->attempt($arr)) {
			if(Auth::guard('nhatuyendung')->user()->trangthai!=1)
			{
				Auth::guard('nhatuyendung')->logout();
				return redirect()->back()->with('alert','Tài khoản bị khóa.');
			}

if(Auth::guard('nhatuyendung')->user()->xacthuc!=1)
  {
    $nhatuyendung=Auth::guard('nhatuyendung')->user();
    $nhatuyendung->token= hash_hmac('sha256', Str::random(40), config('app.key'));
    $nhatuyendung->save();
    $data=[
      'name'=> $nhatuyendung->hoten,    
      'activation_link'=>route('nhatuyendung.activate',$nhatuyendung->token),
    ];
   //   $data->activation_link=route('user.activate',$ungvien->matkhau);
    \Mail::to($nhatuyendung->email)->send(new \App\Mail\Mailnhatuyendung($data));
    Auth::guard('nhatuyendung')->logout();


    return redirect()->back()->with('alert','Đã gửi lại mail xác thực.');
  }

			return redirect('nhatuyendung/quanlytaikhoan');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
		} else {

			return redirect()->back()->with('alert','Đăng nhập không thành công.');
		}
	}
}
