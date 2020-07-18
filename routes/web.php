<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('index');
});
Route::get('/index', function () {
	return view('index');
});
Route::get('/test', 'UngvienController@test');
//Route::get('/timkiemviec','Api\TimkiemviecController@index');

Route::get('/timkiemviec','UngvienController@getTimkiemviec');
Route::get('/tintuyendung/{id}','UngvienController@getTintuyendung');
Route::get('/danh-sach-tin-nha-tuyen-dung/{id}.html','UngvienController@getNhatuyendung');

Route::post('/ungviendangnhap', 'UngvienController@postDangnhap');
Route::post('/ungviendangky', 'UngvienController@postDangky');


Route::get('/ungvien/quanlytaikhoan', 'UngvienController@getQuanlytaikhoan')->middleware('login_ungvien');
Route::post('ungvien/quanlytaikhoan/postThongtincanhan', 'UngvienController@postThongtincanhan')->middleware('login_ungvien');
Route::get('/ungvien/thoat', 'UngvienController@getThoat');

Route::get('/ung-vien/luu-viec-lam/{id}', 'UngvienController@getLuuvieclam')->middleware('login_ungvien');
Route::get('/ung-vien/nop-ho-so/{id}', 'UngvienController@getNophoso')->middleware('login_ungvien');

Route::get('/ungvien/tintuyendungdanop', 'UngvienController@getTintuyendungdanop')->middleware('login_ungvien');

Route::get('/ung-vien/tin-tuyen-dung-luu', 'UngvienController@getTintuyendungluu')->middleware('login_ungvien');

Route::get('/ung-vien/ho-so', 'UngvienController@getHoso')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so', 'UngvienController@postHoso')->middleware('login_ungvien');

Route::post('/ung-vien/khac', 'UngvienController@postKhac')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so/kinh-nghiem-lam-viec-sua/{id}
	', 'UngvienController@postKinhnghiemlamviecsua')->middleware('login_ungvien');
Route::post('ung-vien/ho-so/kinh-nghiem-lam-viec-moi
	', 'UngvienController@postKinhnghiemlamviec')->middleware('login_ungvien');
Route::get('ung-vien/ho-so/kinh-nghiem-lam-viec-xoa/{id}
	', 'UngvienController@getKinhnghiemlamviecxoa')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so/trinh-do-tin-hoc', 'UngvienController@postTrinhdotinhoc')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so/trinh-do-ngoai-ngu-sua/{id_ngoaingu}', 'UngvienController@postTrinhdongoaingusua')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so/trinh-do-ngoai-ngu-moi', 'UngvienController@postTrinhdongoaingumoi')->middleware('login_ungvien');
Route::get('/ung-vien/ho-so/trinh-do-ngoai-ngu-xoa/{id_ngoaingu}', 'UngvienController@getTrinhdongoainguxoa')->middleware('login_ungvien');
Route::get('/ung-vien/ho-so/trinh-do-bang-cap-xoa/{id}', 'UngvienController@getTrinhdobangcapxoa')->middleware('login_ungvien');
Route::post('/ung-vien/ho-so/trinh-do-bang-cap-moi', 'UngvienController@postTrinhdobangcapmoi')->middleware('login_ungvien');
Route::post('/ung-vien/ho-so/trinh-do-bang-cap-sua/{id}', 'UngvienController@postTrinhdobangcapsua')->middleware('login_ungvien');

Route::get('/ung-vien/ho-so/nguoi-tham-khao-xoa/{id}', 'UngvienController@getNguoithamkhaoxoa')->middleware('login_ungvien');
Route::post('/ung-vien/ho-so/nguoi-tham-khao-moi', 'UngvienController@postNguoithamkhaomoi')->middleware('login_ungvien');
Route::post('/ung-vien/ho-so/nguoi-tham-khao-sua/{id}', 'UngvienController@postNguoithamkhaosua')->middleware('login_ungvien');
Route::post('/ungvien/quanlytaikhoan/postthongtincanhan/anh', 'UngvienController@postAnh')->middleware('login_ungvien');

Route::post('/ungvien/quanlytaikhoan/postthongtincanhan/sodienthoai', 'UngvienController@postSodienthoai')->middleware('login_ungvien');
Route::post('/ung-vien/quan-ly-tai-khoan/doi-mat-khau', 'UngvienController@postDoimatkhau')->middleware('login_ungvien');



Route::get('/nhatuyendung','NhatuyendungController@getDangky');
Route::post('/nhatuyendung','NhatuyendungController@postDangky');
Route::post('/nhatuyendungdangnhap','NhatuyendungController@postDangnhap');

Route::get('/nhatuyendung/thoat','NhatuyendungController@getThoat');
Route::get('/nhatuyendung/quanlytaikhoan','NhatuyendungController@getQuanlytaikhoan')->middleware('login_nhatuyendung');
Route::get('/nhatuyendung/tindadang','NhatuyendungController@getTindadang')->middleware('login_nhatuyendung');
Route::get('/nhatuyendung/dangtintuyendung','NhatuyendungController@getDangtintuyendung')->middleware('login_nhatuyendung');
Route::post('/nhatuyendung/dangtintuyendung','NhatuyendungController@postDangtintuyendung')->middleware('login_nhatuyendung');
Route::get('/nha-tuyen-dung/tin-da-dang/{id_tintuyendung}','NhatuyendungController@getDanhsachungvien')->middleware('login_nhatuyendung');
Route::post('/nha-tuyen-dung/tin-da-dang/{id_tintuyendung}/{id_ungvien}','NhatuyendungController@postTrangthaiungviennoptin')->middleware('login_nhatuyendung');
Route::get('/nha-tuyen-dung/tim-ung-vien','NhatuyendungController@getTimungvien')->middleware('login_nhatuyendung');

Route::get('nha-tuyen-dung/ung-vien/{id_ungvien}','NhatuyendungController@getUngvien')->middleware('login_nhatuyendung');

Route::get('nha-tuyen-dung/tin-tuyen-dung/{id_tintuyendung}','NhatuyendungController@getTintuyendung')->middleware('login_nhatuyendung');
Route::get('nha-tuyen-dung/tin-da-dang/huy/{id_tintuyendung}','NhatuyendungController@getHuyTintuyendung')->middleware('login_nhatuyendung');

Route::post('nha-tuyen-dung/quan-ly-tai-khoan/doi-mat-khau','NhatuyendungController@postDoimatkhau')->middleware('login_nhatuyendung');




Route::get('/admin/login','AdminController@getDangnhap');
Route::post('/admin/login','AdminController@postDangnhap');
Route::get('/admin/logout','AdminController@getLogout');


Route::get('/admin/index','AdminController@getIndex')->middleware('login_admin');
Route::get('/admin/thongtinnhatuyendung','AdminController@getThongtinnhatuyendung')->middleware('login_admin');
Route::get('/admin/tintuyendung','AdminController@getTintuyendung')->middleware('login_admin');
Route::get('/admin/thongtinungvien','AdminController@getThongtinungvien')->middleware('login_admin');
Route::post('/admin/nha-tuyen-dung/{id_nhatuyendung}','AdminController@postThongtinnhatuyendung')->middleware('login_admin');
Route::post('/admin/tin-tuyen-dung/{id_tintuyendung}','AdminController@postTintuyendung')->middleware('login_admin');
Route::post('/admin/ung-vien/{id_ungvien}','AdminController@postThongtinungvien')->middleware('login_admin');
/*Thành phố*/
Route::get('admin/thong-so/thanh-pho','AdminController@getThanhpho')->middleware('login_admin');
Route::post('admin/thong-so/thanh-pho/postthanhpho/{id_thanhpho}', 'AdminController@postSuathanhpho')->middleware('login_admin');
Route::post('admin/thong-so/thanh-pho/postthanhpho', 'AdminController@postThemthanhpho')->middleware('login_admin');
/*Cấp bậc*/
Route::get('admin/thong-so/cap-bac','AdminController@getCapbac')->middleware('login_admin');
Route::post('admin/thong-so/cap-bac/postcapbac/{id_capbac}', 'AdminController@postSuacapbac')->middleware('login_admin');
Route::post('admin/thong-so/cap-bac/postcapbac', 'AdminController@postThemcapbac')->middleware('login_admin');
/*Hình thức làm việc*/
Route::get('admin/thong-so/hinh-thuc-lam-viec','AdminController@getHinhthuclamviec')->middleware('login_admin');
Route::post('admin/thong-so/hinh-thuc-lam-viec/posthinhthuclamviec/{id_hinhthuclamviec}', 'AdminController@postSuahinhthuclamviec')->middleware('login_admin');
Route::post('admin/thong-so/hinh-thuc-lam-viec/posthinhthuclamviec', 'AdminController@postThemhinhthuclamviec')->middleware('login_admin');
/*Kinh nghiệm */
Route::get('admin/thong-so/kinh-nghiem','AdminController@getKinhnghiem')->middleware('login_admin');
Route::post('admin/thong-so/kinh-nghiem/postkinhnghiem/{id_kinhnghiem}', 'AdminController@postSuakinhnghiem')->middleware('login_admin');
Route::post('admin/thong-so/kinh-nghiem/postkinhnghiem', 'AdminController@postThemkinhnghiem')->middleware('login_admin');
/*Trình độ*/
Route::get('admin/thong-so/trinh-do','AdminController@getTrinhdo')->middleware('login_admin');
Route::post('admin/thong-so/trinh-do/posttrinhdo/{id_trinhdo}', 'AdminController@postSuatrinhdo')->middleware('login_admin');
Route::post('admin/thong-so/trinh-do/posttrinhdo', 'AdminController@postThemtrinhdo')->middleware('login_admin');
/*Ngành nghề*/
Route::get('admin/thong-so/nganh-nghe','AdminController@getNganhnghe')->middleware('login_admin');
Route::post('admin/thong-so/nganh-nghe/postnganhnghe/{id_nganhnghe}', 'AdminController@postSuanganhnghe')->middleware('login_admin');
Route::post('admin/thong-so/nganh-nghe/postnganhnghe', 'AdminController@postThemnganhnghe')->middleware('login_admin');
/*Kỹ năng*/
Route::get('admin/thong-so/ky-nang','AdminController@getKynang')->middleware('login_admin');
Route::post('admin/thong-so/ky-nang/postkynang/{id_kynang}', 'AdminController@postSuakynang')->middleware('login_admin');
Route::post('admin/thong-so/ky-nang/postkynang', 'AdminController@postThemkynang')->middleware('login_admin');
/*Quy mô nhân sự*/
Route::get('admin/thong-so/quy-mo-nhan-su','AdminController@getQuymonhansu')->middleware('login_admin');
Route::post('admin/thong-so/quy-mo-nhan-su/postquymonhansu/{id_quymonhansu}', 'AdminController@postSuaquymonhansu')->middleware('login_admin');
Route::post('admin/thong-so/quy-mo-nhan-su/postquymonhansu', 'AdminController@postThemquymonhansu')->middleware('login_admin');
/*Mức lương*/
Route::get('admin/thong-so/muc-luong','AdminController@getMucluong')->middleware('login_admin');
Route::post('admin/thong-so/muc-luong/postmucluong/{id_mucluong}', 'AdminController@postSuamucluong')->middleware('login_admin');
Route::post('admin/thong-so/muc-luong/postmucluong', 'AdminController@postThemmucluong')->middleware('login_admin');
/*Ngoại ngữ*/
Route::get('admin/thong-so/ngoai-ngu','AdminController@getNgoaingu')->middleware('login_admin');
Route::post('admin/thong-so/ngoai-ngu/postngoaingu/{id_ngoaingu}', 'AdminController@postSuangoaingu')->middleware('login_admin');
Route::post('admin/thong-so/ngoai-ngu/postngoaingu', 'AdminController@postThemngoaingu')->middleware('login_admin');

/*Route::fallback(function(){
	return redirect('index');
});*/