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
