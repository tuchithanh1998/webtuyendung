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
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class NhatuyendungController extends Controller
{
	public function postThongtinnguoilienhe(Request $request)
	{

	}

	public function postThongtincongty(Request $request)
	{

		$this->validate($request,[
			
			'tencongty'=>'required',
			'diachicongty'=>'required',
			'id_thanhpho'=>'required',
			'sodienthoai'=>'required',
			
			'id_quymonhansu'=>'required',

			

		],[
			'tencongty.required'=>'Tên công ty không được để trống.',
			'diachicongty.required'=>'Địa chỉ không được để trống.',
			'id_thanhpho.required'=>'Thành phố không được để trống.',
			'sodienthoai.required'=>'Số điện thoại không được để trống.',
			
			'id_quymonhansu.required'=>'Quy mô nhân sự không được để trống.',

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
		$data=ungvien::findOrFail($id_ungvien);
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

			$ungvien=ungvien::where('timkiem',1)->where('trangthai',1)->where('id_nganhnghe','>',0)->get();

		}
		else
		{
			$ungvien=$ungvien->where('timkiem',1)->where('trangthai',1)->where('id_nganhnghe','>',0)->get();
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
		return view('nhatuyendung.ungviennoptin',['data'=>$data]);
	}
	public function getDangtintuyendung(){
		return view('nhatuyendung.dangtintuyendung');
	}
	public function postDangtintuyendung(Request $request)
	{
		$this->validate($request,[			
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



		$tintuyendung=new tintuyendung;
		$tintuyendung->tieudetuyendung=$request->tieudetuyendung;
		$tintuyendung->soluongcantuyen=$request->soluongcantuyen;
		$tintuyendung->dotuoi=$request->dotuoi;
		$tintuyendung->gioitinh=$request->gioitinh;
		$tintuyendung->id_kinhnghiem=$request->kinhnghiem;
		$tintuyendung->motacongviec=$request->motacongviec;
		$tintuyendung->quyenloi=$request->quyenloi;
		$tintuyendung->yeucaukhac=$request->yeucaukhac;
		$date=new DateTime();
		$tintuyendung->hannophoso=$date->modify('+'.$request->hannophoso.' day');
		$tintuyendung->id_capbac=$request->capbac;
		$tintuyendung->id_nganhnghe=$request->nganhnghe;
		$tintuyendung->id_hinhthuclamviec=$request->hinhthuclamviec;
		$tintuyendung->id_mucluong=$request->mucluong;
		$tintuyendung->id_trinhdo=$request->trinhdo;
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
		return redirect('nhatuyendung');
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

		$this->validate($request,[
			'email'=>'required|max:255|email|unique:nhatuyendung,email',
			'matkhau1'=>'required|max:255|min:8',
			'matkhau2'=>'required|max:255|min:8|same:matkhau1',
			'tencongty'=>'required',
			'diachicongty'=>'required|max:255',
			'thanhpho'=>'required',
			'sodienthoai'=>'required|max:255',
			'gioithieu'=>'required|min:10|max:1000',
			'quymo'=>'required',
			'websitecongty'=>'max:255',
			'tennguoilienhe'=>'required|max:255',
			'diachilienhe'=>'required|max:255',
			'sodienthoailienhe'=>'required',
			'emaillienhe'=>'required|max:255|email',
			
		],[
			

		]);
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
		$nhatuyendung->logo=$request->logo;
		$nhatuyendung->gioithieu=$request->gioithieu;
		$nhatuyendung->save();

		$arr = [
			'email' => $request->email,
			'password' => $request->matkhau2,
		];
		if (Auth::guard('nhatuyendung')->attempt($arr)) {

			return redirect('nhatuyendung/quanlytaikhoan');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
		}


		
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

			return redirect('nhatuyendung/quanlytaikhoan');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
		} else {

			return redirect()->back()->with('alert','Đăng nhập không thành công.');
		}
	}
}
