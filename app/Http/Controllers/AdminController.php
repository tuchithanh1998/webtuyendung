<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\admin;
use App\nhatuyendung;
use App\tintuyendung;
use App\ungvien;
use App\thanhpho;
use App\capbac;
use App\hinhthuclamviec;
use App\kinhnghiem;
use App\trinhdo;
use App\nganhnghe;
use App\kynang;
use App\quymonhansu;
use App\mucluong;
use App\ngoaingu;




class AdminController extends Controller
{
    /*Thành phố*/
    public function postSuathanhpho(Request $request,$id_thanhpho)
    {

        thanhpho::where('id',$id_thanhpho)->update(['tenthanhpho'=>$request->tenthanhpho,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }

    public function postThemthanhpho(Request $request)
    {
               thanhpho::insert(['tenthanhpho'=>$request->tenthanhpho]);
                return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Cấp bậc*/
    public function postSuacapbac(Request $request,$id_capbac)
    {

        capbac::where('id',$id_capbac)->update(['tencapbac'=>$request->tencapbac,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }

    public function postThemcapbac(Request $request)
    {
               capbac::insert(['tencapbac'=>$request->tencapbac]);
                return redirect()->back()->with('alert','Thêm thành công.');
    }

    /*Hình thức làm việc*/
    public function postSuahinhthuclamviec(Request $request,$id_hinhthuclamviec)
    {
        hinhthuclamviec::where('id',$id_hinhthuclamviec)->update(['tenhinhthuclamviec'=>$request->tenhinhthuclamviec,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemhinhthuclamviec(Request $request)
    {
        hinhthuclamviec::insert(['tenhinhthuclamviec'=>$request->tenhinhthuclamviec]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }

    /*Kinh nghiệm*/
    public function postSuakinhnghiem(Request $request,$id_kinhnghiem)
    {
        kinhnghiem::where('id',$id_kinhnghiem)->update(['tenkinhnghiem'=>$request->tenkinhnghiem,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemkinhnghiem(Request $request)
    {
        kinhnghiem::insert(['tenkinhnghiem'=>$request->tenkinhnghiem]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Trình độ*/
    public function postSuatrinhdo(Request $request,$id_trinhdo)
    {
        trinhdo::where('id',$id_trinhdo)->update(['tentrinhdo'=>$request->tentrinhdo,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemtrinhdo(Request $request)
    {
        trinhdo::insert(['tentrinhdo'=>$request->tentrinhdo]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Ngành nghề*/
    public function postSuanganhnghe(Request $request,$id_nganhnghe)
    {
        nganhnghe::where('id',$id_nganhnghe)->update(['tennganhnghe'=>$request->tennganhnghe,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemnganhnghe(Request $request)
    {
        nganhnghe::insert(['tennganhnghe'=>$request->tennganhnghe]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Kỹ năng*/
    public function postSuakynang(Request $request,$id_kynang)
    {
        kynang::where('id',$id_kynang)->update(['tenkynang'=>$request->tenkynang,'id_nganhnghe'=>$request->nganhnghe,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemkynang(Request $request)
    {
        kynang::insert(['tenkynang'=>$request->tenkynang,'id_nganhnghe'=>$request->nganhnghe]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Quy mô nhân sự*/
    public function postSuaquymonhansu(Request $request,$id_quymonhansu)
    {
        quymonhansu::where('id',$id_quymonhansu)->update(['quymo'=>$request->quymo,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemquymonhansu(Request $request)
    {
        quymonhansu::insert(['quymo'=>$request->quymo]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Mức lương*/
    public function postSuamucluong(Request $request,$id_mucluong)
    {
        mucluong::where('id',$id_mucluong)->update(['tenmucluong'=>$request->tenmucluong,'mucluong1'=>$request->mucluong1,'mucluong2'=>$request->mucluong2,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemmucluong(Request $request)
    {
        mucluong::insert(['tenmucluong'=>$request->tenmucluong,'mucluong1'=>$request->mucluong1,'mucluong2'=>$request->mucluong2]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Ngoại ngữ*/
    public function postSuangoaingu(Request $request,$id_ngoaingu)
    {
        ngoaingu::where('id',$id_ngoaingu)->update(['tenngoaingu'=>$request->tenngoaingu,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemngoaingu(Request $request)
    {
        ngoaingu::insert(['tenngoaingu'=>$request->tenngoaingu]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }

    public function getDangnhap()
        {if(Auth::guard('admin')->check())
            return redirect('admin/index');
    	return view('admin.login');

    }
    public function postThongtinnhatuyendung(Request $request ,$id_nhatuyendung)
    {
        nhatuyendung::where('id',$id_nhatuyendung)->update(['trangthai'=>$request->Radios]);

      //  echo nhatuyendung::where('id',$id_nhatuyendung)->get();

        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postTintuyendung(Request $request ,$id_tintuyendung)
    {
        tintuyendung::where('id',$id_tintuyendung)->update(['trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function getIndex()
    {
    	return view('admin.index');
    }
    public function getThongtinnhatuyendung()
    {
        $nhatuyendung=nhatuyendung::all();

    	return view('admin.thongtinnhatuyendung',['data'=>$nhatuyendung]);
    }
    public function getTintuyendung()
    {
        $tintuyendung=tintuyendung::all();
    	return view('admin.tintuyendung',['data'=>$tintuyendung]);
    }
    public function postThongtinungvien(Request $request ,$id_ungvien)
    {
        ungvien::where('id',$id_ungvien)->update(['trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function getThongtinungvien()
    {
        $ungvien=ungvien::all();
    	return view('admin.thongtinungvien',['data'=>$ungvien]);
    }
    public function postDangnhap(Request $request)
    {
        if(Auth::guard('admin')->check())
            return redirect('admin/index');
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($arr)) {

            return redirect('admin/index');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {

         return redirect()->back()->with('alert','Đăng nhập không thành công.');
        }
    }
    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function getThanhpho()
    {
        $thanhpho=thanhpho::all();
          return view('admin/thanhpho',['data'=>$thanhpho]);
    }
    public function getCapbac()
    {
        $capbac=capbac::all();
        return view('admin/capbac',['data'=>$capbac]);
    }
    public function getHinhthuclamviec()
    {
        $hinhthuclamviec=hinhthuclamviec::all();
        return view('admin/hinhthuclamviec',['data'=>$hinhthuclamviec]);
    }
    public function getKinhnghiem()
    {
        $kinhnghiem=kinhnghiem::all();
        return view('admin/kinhnghiem',['data'=>$kinhnghiem]);
    }
    public function getTrinhdo()
    {
        $trinhdo=trinhdo::all();
        return view('admin/trinhdo',['data'=>$trinhdo]);
    }
    public function getNganhnghe()
    {
        $nganhnghe=nganhnghe::all();
        return view('admin/nganhnghe',['data'=>$nganhnghe]);
    }
    public function getKynang()
    {
        $kynang=kynang::all();
        return view('admin/kynang',['data'=>$kynang]);
    }
    public function getQuymonhansu()
    {
        $quymonhansu=quymonhansu::all();
        return view('admin/quymonhansu',['data'=>$quymonhansu]);
    }
    public function getMucluong()
    {
        $mucluong=mucluong::all();
        return view('admin/mucluong',['data'=>$mucluong]);
    }
    public function getNgoaingu()
    {
        $ngoaingu=ngoaingu::all();
        return view('admin/ngoaingu',['data'=>$ngoaingu]);
    }


}
