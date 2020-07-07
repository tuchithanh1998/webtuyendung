<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\admin;
use App\nhatuyendung;


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
    	return view('admin.tintuyendung');
    }
    public function getThongtinungvien()
    {
    	return view('admin.thongtinungvien');
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
}
