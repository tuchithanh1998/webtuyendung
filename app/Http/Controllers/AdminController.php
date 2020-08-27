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
use Illuminate\Support\Facades\Hash;




class AdminController extends Controller
{
    public function postDoimatkhauadmin(Request $request)
    {
        if (!(Hash::check($request->oldpassword,Auth::guard('admin')->user()->matkhau))) 
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


    admin::where('id',Auth::guard('admin')->user()->id)->update(['matkhau'=>bcrypt($request->newpassword2)]);
    return redirect()->back()->with('alert','Đổi mật khẩu thành công');
    }
    /*Quan tri vien*/
    public function getThemquantrivien()
    {
         $admin=admin::where('quyen','<>',1)->get();

        return view('admin.themquantrivien',['data'=>$admin]);
    
    }

    public function postThemquantrivien(Request $request)
    {


        $this->validate($request,
        [
            'tenquantri' => 'required',
            'email' => 'required|unique:admin,email|email',
            'matkhau' => 'required|min:8',
            'sodienthoai' => 'required|min:10|max:10',
            'diachi' => 'required',
           
        ],

        [
                'tenquantri.required'=>'Tên không được để trống!',
                'email.required'=>'Email không được để trống!',
                'email.email'=>'Email không đúng định dạng!',
                'email.unique'=>'Email đã tồn tại!',
                'matkhau.required'=>'Mật khẩu không được để trống!',
                'matkhau.min'=>'Mật khẩu tối thiểu 8 kí tự!',
                'sodienthoai.required'=>'Số điện thoại không được để trống!',
                'sodienthoai.min'=>'Số điện thoại tối thiểu 10 kí tự!',
                'sodienthoai.max'=>'Số điện thoại số đa 10 kí tự!',    
                'diachi.required'=>'Địa chỉ không được để trống!',
        ]

    );

        admin::insert(['ten'=>$request->tenquantri, 'email'=>$request->email,'matkhau'=>bcrypt($request->matkhau),'sodienthoai'=>$request->sodienthoai,'diachi'=>$request->diachi,'quyen'=>2,'trangthai'=>1]);
                return redirect()->back()->with('alert','Thêm thành công.');
    }

    public function postSuaquantrivien(Request $request,$id_admin)
    {
        $this->validate($request,
        [
            'tenquantri' => 'required:admin,tenquantri',
            'email' => 'required:admin,email|email',
            'sodienthoai' => 'required|min:10|max:10',
            'diachi' => 'required',
           
        ],

        [
                'tenquantri.required'=>'Tên không được để trống!',
                'email.required'=>'Email không được để trống!',
                'email.email'=>'Email không đúng định dạng!',
                'sodienthoai.required'=>'Số điện thoại không được để trống!',
                'sodienthoai.min'=>'Số điện thoại tối thiểu 10 kí tự!',
                'sodienthoai.max'=>'Số điện thoại số đa 10 kí tự!',    
                'diachi.required'=>'Địa chỉ không được để trống!',
        ]

    );

       admin::where('id',$id_admin)->update(['ten'=>$request->tenquantri, 'email'=>$request->email,'sodienthoai'=>$request->sodienthoai,'diachi'=>$request->diachi,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    /*Thành phố*/
    public function postSuathanhpho(Request $request,$id_thanhpho)
    {
        $this->validate($request,
        [
            'tenthanhpho' => 'required|unique:thanhpho,tenthanhpho,'.$id_thanhpho.','
           
        ],

        [
                'tenthanhpho.required'=>'Không được để trống!',
                 'tenthanhpho.unique'=>'Đã tồn tại!',

        ]

    );

        thanhpho::where('id',$id_thanhpho)->update(['tenthanhpho'=>$request->tenthanhpho,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }

    public function postThemthanhpho(Request $request)
    {   

    $this->validate($request,
        [
            'tenthanhpho' => 'required|unique:thanhpho,tenthanhpho',
           
        ],

        [
                'tenthanhpho.required'=>'Không được để trống!',
                 'tenthanhpho.unique'=>'Đã tồn tại!',

        ]

    );


               thanhpho::insert(['tenthanhpho'=>$request->tenthanhpho]);
                return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Cấp bậc*/
    public function postSuacapbac(Request $request,$id_capbac)
    {
        $this->validate($request,
        [
            'tencapbac' => 'required|unique:capbac,tencapbac,'.$id_capbac.','
           
        ],

        [
                'tencapbac.required'=>'Không được để trống!',
                 'tencapbac.unique'=>'Đã tồn tại!',

        ]

    );

        capbac::where('id',$id_capbac)->update(['tencapbac'=>$request->tencapbac,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }

    public function postThemcapbac(Request $request)
    {
        $this->validate($request,
        [
            'tencapbac' => 'required|unique:capbac,tencapbac',
           
        ],

        [
                'tencapbac.required'=>'Không được để trống!',
                 'tencapbac.unique'=>'Đã tồn tại!',

        ]

    );
               capbac::insert(['tencapbac'=>$request->tencapbac]);
                return redirect()->back()->with('alert','Thêm thành công.');
    }

    /*Hình thức làm việc*/
    public function postSuahinhthuclamviec(Request $request,$id_hinhthuclamviec)
    {
        $this->validate($request,
        [
            'tenhinhthuclamviec' => 'required|unique:hinhthuclamviec,tenhinhthuclamviec,'.$id_hinhthuclamviec.','
           
        ],

        [
                'tenhinhthuclamviec.required'=>'Không được để trống!',
                 'tenhinhthuclamviec.unique'=>'Đã tồn tại!',

        ]

    );
        hinhthuclamviec::where('id',$id_hinhthuclamviec)->update(['tenhinhthuclamviec'=>$request->tenhinhthuclamviec,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemhinhthuclamviec(Request $request)
    {
        $this->validate($request,
        [
            'tenhinhthuclamviec' => 'required|unique:hinhthuclamviec,tenhinhthuclamviec',
           
        ],

        [
                'tenhinhthuclamviec.required'=>'Không được để trống!',
                 'tenhinhthuclamviec.unique'=>'Đã tồn tại!',

        ]

    );
        hinhthuclamviec::insert(['tenhinhthuclamviec'=>$request->tenhinhthuclamviec]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }

    /*Kinh nghiệm*/
    public function postSuakinhnghiem(Request $request,$id_kinhnghiem)
    {
        $this->validate($request,
        [
            'tenkinhnghiem' => 'required|unique:kinhnghiem,tenkinhnghiem,'.$id_kinhnghiem.','
        ],

        [
                'tenkinhnghiem.required'=>'Không được để trống!',
                 'tenkinhnghiem.unique'=>'Đã tồn tại!',

        ]

    );
        kinhnghiem::where('id',$id_kinhnghiem)->update(['tenkinhnghiem'=>$request->tenkinhnghiem,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemkinhnghiem(Request $request)
    {
        $this->validate($request,
        [
            'tenkinhnghiem' => 'required|unique:kinhnghiem,tenkinhnghiem',
           
        ],

        [
                'tenkinhnghiem.required'=>'Không được để trống!',
                 'tenkinhnghiem.unique'=>'Đã tồn tại!',

        ]

    );
        kinhnghiem::insert(['tenkinhnghiem'=>$request->tenkinhnghiem]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Trình độ*/
    public function postSuatrinhdo(Request $request,$id_trinhdo)
    {
        $this->validate($request,
        [
            'tentrinhdo' => 'required|unique:trinhdo,tentrinhdo,'.$id_trinhdo.','
        ],

        [
                'tentrinhdo.required'=>'Không được để trống!',
                 'tentrinhdo.unique'=>'Đã tồn tại!',

        ]

    );
        trinhdo::where('id',$id_trinhdo)->update(['tentrinhdo'=>$request->tentrinhdo,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemtrinhdo(Request $request)
    {
        $this->validate($request,
        [
            'tentrinhdo' => 'required|unique:trinhdo,tentrinhdo',
        ],

        [
                'tentrinhdo.required'=>'Không được để trống!',
                 'tentrinhdo.unique'=>'Đã tồn tại!',

        ]

    );
        trinhdo::insert(['tentrinhdo'=>$request->tentrinhdo]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Ngành nghề*/
    public function postSuanganhnghe(Request $request,$id_nganhnghe)
    {
        $this->validate($request,
        [
            'tennganhnghe' => 'required|unique:nganhnghe,tennganhnghe,'.$id_nganhnghe.','
        ],

        [
                'tennganhnghe.required'=>'Không được để trống!',
                 'tennganhnghe.unique'=>'Đã tồn tại!',

        ]

    );
        nganhnghe::where('id',$id_nganhnghe)->update(['tennganhnghe'=>$request->tennganhnghe,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemnganhnghe(Request $request)
    {
        $this->validate($request,
        [
            'tennganhnghe' => 'required|unique:nganhnghe,tennganhnghe',
        ],

        [
                'tennganhnghe.required'=>'Không được để trống!',
                 'tennganhnghe.unique'=>'Đã tồn tại!',

        ]

    );
        nganhnghe::insert(['tennganhnghe'=>$request->tennganhnghe]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Kỹ năng*/
    public function postSuakynang(Request $request,$id_kynang)
    {
        $this->validate($request,
        [
            'tenkynang' => 'required:kynang,tenkynang,'.$id_kynang.','
        ],

        [
                'tenkynang.required'=>'Không được để trống!',

        ]

    );
        kynang::where('id',$id_kynang)->update(['tenkynang'=>$request->tenkynang,'id_nganhnghe'=>$request->nganhnghe,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemkynang(Request $request)
    {
        $this->validate($request,
        [
            'tenkynang' => 'required:kynang,tenkynang',
        ],

        [
                'tenkynang.required'=>'Không được để trống!',

        ]

    );
        kynang::insert(['tenkynang'=>$request->tenkynang,'id_nganhnghe'=>$request->nganhnghe]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Quy mô nhân sự*/
    public function postSuaquymonhansu(Request $request,$id_quymonhansu)
    {
        $this->validate($request,
        [
            'quymo' => 'required|unique:quymonhansu,'.$id_quymonhansu.','
        ],

        [
                'quymo.required'=>'Không được để trống!',
                 'quymo.unique'=>'Đã tồn tại!',

        ]

    );
        quymonhansu::where('id',$id_quymonhansu)->update(['quymo'=>$request->quymo,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemquymonhansu(Request $request)
    {
        $this->validate($request,
        [
            'quymo' => 'required|unique:quymonhansu',
        ],

        [
                'quymo.required'=>'Không được để trống!',
                 'quymo.unique'=>'Đã tồn tại!',

        ]

    );
        quymonhansu::insert(['quymo'=>$request->quymo]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Mức lương*/
    public function postSuamucluong(Request $request,$id_mucluong)
    {
        $this->validate($request,
        [
            'tenmucluong' => 'required|unique:mucluong,tenmucluong,'.$id_mucluong,
            'mucluong1'=>'required',
            'mucluong2'=>'required',

        ],

        [
                'tenmucluong.required'=>'Không được để trống!',
                 'tenmucluong.unique'=>'Đã tồn tại!',
                 'mucluong1.required'=>'Không được để trống!',
                 'mucluong2.required'=>'Không được để trống!',

        ]

    );
        mucluong::where('id',$id_mucluong)->update(['tenmucluong'=>$request->tenmucluong,'mucluong1'=>$request->mucluong1,'mucluong2'=>$request->mucluong2,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemmucluong(Request $request)
    {
        $this->validate($request,
        [
            'tenmucluong' => 'required|unique:mucluong,tenmucluong',
            'mucluong1'=>'required',
            'mucluong2'=>'required',
        ]
,
        [
                'tenmucluong.required'=>'Không được để trống!',
                 'tenmucluong.unique'=>'Đã tồn tại!',
                 'mucluong1.required'=>'Không được để trống!',
                 'mucluong2.required'=>'Không được để trống!',

        ]

    );
        mucluong::insert(['tenmucluong'=>$request->tenmucluong,'mucluong1'=>$request->mucluong1,'mucluong2'=>$request->mucluong2]);
        return redirect()->back()->with('alert','Thêm thành công.');
    }
    /*Ngoại ngữ*/
    public function postSuangoaingu(Request $request,$id_ngoaingu)
    {
        $this->validate($request,
        [
            'tenngoaingu' => 'required|unique:ngoaingu,tenngoaingu,'.$id_ngoaingu.','
        ],

        [
                'tenngoaingu.required'=>'Không được để trống!',
                 'tenngoaingu.unique'=>'Đã tồn tại!',

        ]

    );
        ngoaingu::where('id',$id_ngoaingu)->update(['tenngoaingu'=>$request->tenngoaingu,'trangthai'=>$request->Radios]);
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postThemngoaingu(Request $request)
    {
        $this->validate($request,
        [
            'tenngoaingu' => 'required|unique:ngoaingu,tenngoaingu',
        ],

        [
                'tenngoaingu.required'=>'Không được để trống!',
                 'tenngoaingu.unique'=>'Đã tồn tại!',

        ]

    );
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

 $nhatuyendung=nhatuyendung::findOrFail($id_nhatuyendung);
        if($nhatuyendung->trangthai!=$request->Radios)
        {
        nhatuyendung::where('id',$id_nhatuyendung)->update(['trangthai'=>$request->Radios,'id_admin'=>Auth::guard('admin')->user()->id]);

      
        if($request->Radios==2)
            $khoa='khóa';
        else
            $khoa='mở khóa';

        

         $data=[
      'khoa'=> $khoa,    
      'ten'=> $nhatuyendung->tennguoilienhe,    
      'taikhoan'=>$nhatuyendung->tencongty,
      'nd'=>'tài khoản ',
    ];
   
    \Mail::to($nhatuyendung->email)->send(new \App\Mail\Mailkhoataikhoan($data));


    //    nhatuyendung::where('id',$id_nhatuyendung)->update(['trangthai'=>$request->Radios]);

      //  echo nhatuyendung::where('id',$id_nhatuyendung)->get();

       }
        return redirect()->back()->with('alert','Cập nhật thành công.');
    }
    public function postTintuyendung(Request $request ,$id_tintuyendung)
    {

$tintuyendung=tintuyendung::findOrFail($id_tintuyendung);
        if($tintuyendung->trangthai!=$request->Radios)
        {


        $nhatuyendung= nhatuyendung::findOrFail($tintuyendung->id_nhatuyendung);   
        tintuyendung::where('id',$id_tintuyendung)->update(['trangthai'=>$request->Radios,'id_admin'=>Auth::guard('admin')->user()->id]);

      
        if($request->Radios==2)
            $khoa='khóa tin tuyển dụng';
        else
            $khoa='mở khóa tin tuyển dụng';

        

         $data=[
      'khoa'=> $khoa,    
      'ten'=> $nhatuyendung->tennguoilienhe,    
      'taikhoan'=>$nhatuyendung->tencongty,
      'nd'=>$tintuyendung->tieudetuyendung,
    ];
   
    \Mail::to($nhatuyendung->email)->send(new \App\Mail\Mailkhoataikhoan($data));


}
        //tintuyendung::where('id',$id_tintuyendung)->update(['trangthai'=>$request->Radios]);
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
            $ungvien=ungvien::findOrFail($id_ungvien);
        if($ungvien->trangthai!=$request->Radios)
        {
        ungvien::where('id',$id_ungvien)->update(['trangthai'=>$request->Radios,'id_admin'=>Auth::guard('admin')->user()->id]);

      
        if($request->Radios==2)
            $khoa='khóa';
        else
            $khoa='mở khóa';

        

         $data=[
      'khoa'=> $khoa,    
      'ten'=> $ungvien->hoten,    
      'taikhoan'=>$ungvien->email,
      'nd'=' ',
    ];
   
    \Mail::to($ungvien->email)->send(new \App\Mail\Mailkhoataikhoan($data));

}
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
                    if(Auth::guard('admin')->user()->trangthai!=1)
                    {
                        Auth::guard('admin')->logout();
                        return redirect()->back()->with('alert','Tài khoản đã bị khóa!');
                    }
            return redirect('admin/index');
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
