<?php

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
		return view('welcome');
	});
Route::get('chi-tiet-phong-kham/{id}', [
		'as'   => 'chitietphongkham',
		'uses' => 'PageController@getChitiet'
	]);
Route::get('datkham', [
		'as'   => 'datkham',
		'uses' => 'PageController@getDatKham'
	]);
Route::post('datkham', [
		'as'   => 'datkham',
		'uses' => 'PageController@postDatKham'
	]);
Route::get('danhsachphongkham', [
		'as'   => 'danhsachphongkham',
		'uses' => 'PageController@getDanhSach'
	]);
Route::get('danhsachchuyenkhoa', [
		'as'   => 'danhsachchuyenkhoa',
		'uses' => 'Pk_QLChuyenKhoaController@getDSCK'
	]);

Route::post('danhsachchuyenkhoa', [
		'as'   => 'danhsachchuyenkhoa',
		'uses' => 'Pk_QLChuyenKhoaController@postDSCK'
	]);
Route::get('danhsachdichvu', [
		'as'   => 'danhsachdichvu',
		'uses' => 'Pk_QLDichVuController@getDSDV'
	]);

Route::post('danhsachdichvu', [
		'as'   => 'danhsachdichvu',
		'uses' => 'Pk_QLDichVuController@postDSDV'
	]);
Route::get('index', [
		'as'   => 'trang-chu',
		'uses' => 'PageController@getIndex'
	]);

Route::get('lien-he', [
		'as'   => 'lienhe',
		'uses' => 'PageController@getLienHe'
	]);

Route::get('gioi-thieu', [
		'as'   => 'gioithieu',
		'uses' => 'PageController@getGioiThieu'
	]);
Route::get('quan-ly-bn', [
		'as'   => 'ndk_quanly',
		'uses' => 'Ndk_QLNguoiDangKyController@getQuanLyNDK'
	]);
Route::get('quan-ly-nvphongkham', [
		'as'   => 'nvphongkham_quanly',
		'uses' => 'Pk_QLNhanVienPKController@getNVPKQuanLy'
	]);
Route::get('thong-tin-nv', [
		'as'   => 'thongtinnv',
		'uses' => 'Nv_QLThongTinNVController@getTTNV'
	]);
Route::get('thong-tin-pk', [
		'as'   => 'thongtinphongkham',
		'uses' => 'Pk_QLThongTinPkController@getTTPK'
	]);
Route::get('thong-tin-benh-nhan', [
		'as'   => 'thongtinbenhnhan',
		'uses' => 'Pk_QLThongTinBenhNhanController@getTTBN'
	]);
Route::get('thong-tin-bn', [
		'as'   => 'bn_quanly',
		'uses' => 'Ndk_QLBenhNhanController@getTTBN'
	]);
Route::get('thong-tin-dangky', [
		'as'   => 'qldangkykhambenh',
		'uses' => 'Ndk_QLThongTinDangKyController@getTTKB'
	]);
Route::get('thong-tin-dang-ky', [
		'as'   => 'pkqlkhambenh',
		'uses' => 'Pk_QLThongTinDangKyController@getPKTTKB'
	]);
Route::get('thong-tin-cakham', [
		'as'   => 'thongtincakham',
		'uses' => 'Pk_QLCaKhamController@getTTCaKham'
	]);
Route::get('thong-tin-lichnghi', [
		'as'   => 'thongtinlichnghi',
		'uses' => 'Pk_QLLichNghiKhamController@getTTLichNghi'
	]);
Route::get('thong-tin-buongkham', [
		'as'   => 'thongtinbuongkham',
		'uses' => 'Pk_QLBuongKhamController@getTTBuongKham'
	]);

Route::get('dang-nhap', [
		'as'   => 'login',
		'uses' => 'PageController@getLogin'
	]);
Route::post('dang-nhap', [
		'as'   => 'login',
		'uses' => 'PageController@postLogin'
	]);
Route::get('dang-nhap-2', [
		'as'   => 'login2',
		'uses' => 'PageController@getLogin2'
	]);
Route::post('dang-nhap-2', [
		'as'   => 'login2',
		'uses' => 'PageController@postLogin2'
	]);
Route::get('dang-nhap-3', [
		'as'   => 'login3',
		'uses' => 'PageController@getLogin3'
	]);
Route::post('dang-nhap-3', [
		'as'   => 'login3',
		'uses' => 'PageController@postLogin3'
	]);
Route::get('dang-ki', [
		'as'   => 'signin',
		'uses' => 'PageController@getSignin'
	]);
Route::get('dang-ki-phongkham', [
		'as'   => 'signinphongkham',
		'uses' => 'PageController@getSigninPK'
	]);
Route::post('dang-ki', [
		'as'   => 'signin',
		'uses' => 'PageController@postSignin'
	]);
Route::post('dang-ki-phongkham', [
		'as'   => 'signinphongkham',
		'uses' => 'PageController@postSigninPK'
	]);
Route::get('dang-xuat', [
		'as'   => 'logout',
		'uses' => 'PageController@postLogout'
	]);
Route::get('search', [
		'as'   => 'search',
		'uses' => 'PageController@getTimKiem'
	]);
Route::post('search', [
		'as'   => 'search',
		'uses' => 'PageController@postTimKiem'
	]);
Route::get('timkiem/{id}', [
		'as'   => 'timkiem',
		'uses' => 'PageController@getTimKiem2'
	]);
Route::post('comment/{id}', 'CommentController@postComment');

Route::group(['prefix' => 'phongkham'], function () {
		Route::post('/password/email', 'Auth\PhongKhamForgotPasswordController@sendResetLinkEmail')->name('phongkham.password.email');
		Route::get('/password/reset', 'Auth\PhongKhamForgotPasswordController@showLinkRequestForm')->name('phongkham.password.request');
		Route::post('/password/reset', 'Auth\PhongKhamResetPasswordController@reset');
		Route::get('/password/reset/{token}', 'Auth\PhongKhamResetPasswordController@showResetForm')->name('phongkham.password.reset');
	});

Route::group(['prefix' => 'nguoidangky'], function () {
		Route::post('/password/email', 'Auth\NguoiDangKyForgotPasswordController@sendResetLinkEmail')->name('nguoidangky.password.email');
		Route::get('/password/reset', 'Auth\NguoiDangKyForgotPasswordController@showLinkRequestForm')->name('nguoidangky.password.request');
		Route::post('/password/reset', 'Auth\NguoiDangKyResetPasswordController@reset');
		Route::get('/password/reset/{token}', 'Auth\NguoiDangKyResetPasswordController@showResetForm2')->name('nguoidangky.password.reset');
	});

Route::group(['prefix' => 'admin'], function () {
		Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
		Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm3')->name('admin.password.reset');
	});
Route::group(['prefix' => 'page'], function () {

		Route::get('timkiem/{id}', 'PageController@getTimKiem2');
		Route::get('datkham/{id}', 'PageController@getDatKham');
		Route::post('datkham/{id}', 'PageController@postDatKham');

	});
Route::group(['prefix' => 'ajax'], function () {
		Route::get('quanhuyen/{matp}', 'AjaxController@getQuanHuyen');
		Route::get('phuongxa/{maqh}', 'AjaxController@getPhuongXa');
	});

Route::group(['prefix'     => 'client'], function () {
		Route::group(['prefix'   => 'nguoidangky'], function () {
				Route::group(['prefix' => 'nguoidangky'], function () {
						Route::get('sua/{madangky}', 'Ndk_QLNguoiDangKyController@getEditDK');
						Route::post('sua/{madangky}', 'Ndk_QLNguoiDangKyController@postEditDK');

						Route::get('xoa/{makhambenh}', 'Ndk_QLThongTinDangKyController@getXoaTTKB');

					});
				Route::group(['prefix' => 'lichdangky'], function () {
						Route::get('xoa/{makhambenh}', 'Ndk_QLThongTinDangKyController@getXoaTTKB');

					});
			});
		Route::group(['prefix'   => 'nhanvienphongkham'], function () {
				Route::group(['prefix' => 'qlthongtin'], function () {
						Route::get('sua/{manv}', 'Nv_QLThongTinNVController@getSuaTTNV');
						Route::post('sua/{manv}', 'Nv_QLThongTinNVController@postSuaTTNV');

					});

			});
		Route::group(['prefix'   => 'quanlyphongkham'], function () {
				Route::group(['prefix' => 'nhanvien'], function () {
						Route::get('sua/{manv}', 'Pk_QLNhanVienPKController@getSuaNVPK');
						Route::post('sua/{manv}', 'Pk_QLNhanVienPKController@postSuaNVPK');

						Route::get('them', 'Pk_QLNhanVienPKController@getThemNVPK');
						Route::post('them', 'Pk_QLNhanVienPKController@postThemNVPK');

						Route::get('xoa/{manv}', 'Pk_QLNhanVienPKController@getXoaNVPK');
					});

				Route::group(['prefix' => 'lichnghikham'], function () {
						Route::get('them', 'Pk_QLLichNghiKhamController@getThemTTLN');
						Route::post('them', 'Pk_QLLichNghiKhamController@postThemTTLN');

						Route::get('sua/{malich}', 'Pk_QLLichNghiKhamController@getSuaTTLN');
						Route::post('sua/{malich}', 'Pk_QLLichNghiKhamController@postSuaTTLN');

						Route::get('xoa/{malich}', 'Pk_QLLichNghiKhamController@getXoaTTLN');

					});
				Route::group(['prefix' => 'dangkykhambenh'], function () {
						Route::get('sua/{makhambenh}', 'Pk_QLThongTinDangKyController@getSuaTTKB');
						Route::post('sua/{malich}', 'Pk_QLThongTinDangKyController@postSuaTTKB');
						Route::get('xoa/{makhambenh}', 'Pk_QLThongTinDangKyController@getXoaTTKB');
					});
				Route::group(['prefix' => 'benhnhan'], function () {
						Route::get('sua/{mabenhnhan}', 'Pk_QLThongTinBenhNhanController@getSuaTTBN');
						Route::post('sua/{mabenhnhan}', 'Pk_QLThongTinBenhNhanController@postSuaTTBN');

					});
				Route::group(['prefix' => 'ketquadangky'], function () {
						Route::get('them/{madangky}', 'Pk_QLKetQuaDangKyController@getKetQuaDangKy');
						Route::post('them/{madangky}', 'Pk_QLKetQuaDangKyController@postKetQuaDangKy');
					});

				Route::group(['prefix' => 'chuyenkhoa'], function () {
						Route::get('xoa/{id}', 'Pk_QLChuyenKhoaController@getXoaCKPK');

					});
				Route::group(['prefix' => 'dichvu'], function () {
						Route::get('xoa/{madichvu}', 'Pk_QLDichVuController@getXoaDVPK');

					});
				Route::group(['prefix' => 'buongkham'], function () {
						Route::get('them', 'Pk_QLBuongKhamController@getThemTTBK');
						Route::post('them', 'Pk_QLBuongKhamController@postThemTTBK');

						Route::get('sua/{mabuongkham}', 'Pk_QLBuongKhamController@getSuaTTBK');
						Route::post('sua/{mabuongkham}', 'Pk_QLBuongKhamController@postSuaTTBK');

						Route::get('xoa/{mabuongkham}', 'Pk_QLBuongKhamController@getXoaTTBK');

					});

				Route::group(['prefix' => 'phongkham'], function () {
						Route::get('sua/{id}', 'Pk_QLThongTinPkController@getSuaTTPK');
						Route::post('sua/{id}', 'Pk_QLThongTinPkController@postSuaTTPK');
					});
			});
	});
Route::get('sever/dangnhap', 'UserController@getDangNhap');
Route::get('sever/quenmatkhau', 'UserController@getQuenMatKhau');
Route::post('sever/dangnhap', 'UserController@postDangNhap');
Route::post('sever/quenmatkhau', 'UserController@postQuenMatKhau');
Route::get('sever/logout', 'UserController@getDangXuat');
Route::group(['prefix'   => 'sever', 'middleware'   => 'severLogin'], function () {
		Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
				Route::get('trangchu', 'UserController@getTrangChu1');
				Route::group(['prefix' => 'user'], function () {
						Route::get('danhsach', 'UserController@getDanhSach');

						Route::get('sua/{id}', 'UserController@getSua');
						Route::post('sua/{id}', 'UserController@postSua');

						Route::get('them', 'UserController@getThem');
						Route::post('them', 'UserController@postThem');

						Route::get('xoa/{id}', 'UserController@getXoa');

					});
				Route::group(['prefix' => 'hopdong'], function () {
						Route::get('danhsach', 'HopDongController@getDanhSach1');

						Route::get('thongbao/{id}', 'HopDongController@getThongBao1');

						Route::get('sua/{id}', 'HopDongController@getSua1');
						Route::post('sua/{id}', 'HopDongController@postSua1');

						Route::get('them/{id}', 'HopDongController@getThem1');
						Route::post('them/{id}', 'HopDongController@postThem1');

						Route::get('xoa/{id}', 'HopDongController@getXoa1');

					});
				Route::group(['prefix' => 'giahan'], function () {
						Route::get('danhsach', 'GiaHanHopDongController@getDanhSach1');

						Route::get('sua/{id}', 'GiaHanHopDongController@getSua1');
						Route::post('sua/{id}', 'GiaHanHopDongController@postSua1');

						Route::get('them/{id}', 'GiaHanHopDongController@getThem1');
						Route::post('them/{id}', 'GiaHanHopDongController@postThem1');

						Route::get('xoa/{id}', 'GiaHanHopDongController@getXoa1');

					});
				Route::group(['prefix' => 'thongke'], function () {
						Route::get('all', 'ThongKeController@getThongKeAll1');
						Route::get('today', 'ThongKeController@getThongKeToDay1');
						Route::get('thisweek', 'ThongKeController@getThongKeThisWeek1');
						Route::get('thismonth', 'ThongKeController@getThongKeThisMonth1');
						Route::get('thisyear', 'ThongKeController@getThongKeThisYear1');
					});
			});
		Route::group(['prefix'   => 'nhanvien', 'middleware'   => 'nhanvienLogin'], function () {
				Route::group(['prefix' => 'ajax'], function () {
						Route::get('quanhuyen/{matp}', 'AjaxController@getQuanHuyen');
						Route::get('phuongxa/{maqh}', 'AjaxController@getPhuongXa');
						Route::get('phongkham/{trangthai}', 'AjaxController@getPhongKham');
					});
				Route::group(['prefix' => 'phongkham'], function () {
						Route::get('danhsach', 'PhongKhamController@getDanhSach');

						Route::get('sua/{id}', 'PhongKhamController@getSua');
						Route::post('sua/{id}', 'PhongKhamController@postSua');

						Route::get('them', 'PhongKhamController@getThem');
						Route::post('them', 'PhongKhamController@postThem');

						Route::get('xoa/{id}', 'PhongKhamController@getXoa');

					});
				Route::group(['prefix' => 'nguoidangky'], function () {
						Route::get('danhsach', 'NguoiDangKyController@getDanhSach');

						Route::get('sua/{madangky}', 'NguoiDangKyController@getSua');
						Route::post('sua/{madangky}', 'NguoiDangKyController@postSua');

						Route::get('them', 'NguoiDangKyController@getThem');
						Route::post('them', 'NguoiDangKyController@postThem');

						Route::get('xoa/{madangky}', 'NguoiDangKyController@getXoa');
					});
				Route::group(['prefix' => 'loaidichvu'], function () {
						Route::get('danhsach', 'LoaiDichVuController@getDanhSach');

						Route::get('sua/{id}', 'LoaiDichVuController@getSua');
						Route::post('sua/{id}', 'LoaiDichVuController@postSua');

						Route::get('them', 'LoaiDichVuController@getThem');
						Route::post('them', 'LoaiDichVuController@postThem');

						Route::get('xoa/{id}', 'LoaiDichVuController@getXoa');
					});
				Route::group(['prefix' => 'chuyenkhoa'], function () {
						Route::get('danhsach', 'ChuyenKhoaController@getDanhSach');

						Route::get('sua/{id}', 'ChuyenKhoaController@getSua');
						Route::post('sua/{id}', 'ChuyenKhoaController@postSua');

						Route::get('them', 'ChuyenKhoaController@getThem');
						Route::post('them', 'ChuyenKhoaController@postThem');

						Route::get('xoa/{id}', 'ChuyenKhoaController@getXoa');
					});
				Route::group(['prefix' => 'dichvu'], function () {
						Route::get('danhsach', 'DichVuController@getDanhSach');

						Route::get('sua/{id}', 'DichVuController@getSua');
						Route::post('sua/{id}', 'DichVuController@postSua');

						Route::get('them', 'DichVuController@getThem');
						Route::post('them', 'DichVuController@postThem');

						Route::get('xoa/{id}', 'DichVuController@getXoa');

						Route::get('gioithieu/{id}', 'DichVuController@getGioiThieu');
					});
				Route::group(['prefix' => 'danhmuctintuc'], function () {
						Route::get('danhsach', 'DanhMucTinTucController@getDanhSach');

						Route::get('sua/{id}', 'DanhMucTinTucController@getSua');
						Route::post('sua/{id}', 'DanhMucTinTucController@postSua');

						Route::get('them', 'DanhMucTinTucController@getThem');
						Route::post('them', 'DanhMucTinTucController@postThem');

						Route::get('xoa/{id}', 'DanhMucTinTucController@getXoa');
					});
				// Route::group(['prefix' => 'thuoc'], function () {
				// 		Route::get('danhsach', 'ThuocController@getDanhSach');

				// 		Route::get('sua/{id}', 'ThuocController@getSua');
				// 		Route::post('sua/{id}', 'ThuocController@postSua');

				// 		Route::get('them', 'ThuocController@getThem');
				// 		Route::post('them', 'ThuocController@postThem');

				// 		Route::get('xoa/{id}', 'ThuocController@getXoa');

				// 		Route::get('gioithieu/{id}', 'ThuocController@getGioiThieu');
				// 	});
				Route::group(['prefix' => 'hopdong'], function () {
						Route::get('danhsach', 'HopDongController@getDanhSach');

						Route::get('thongbao/{id}', 'HopDongController@getThongBao');

						Route::get('sua/{id}', 'HopDongController@getSua');
						Route::post('sua/{id}', 'HopDongController@postSua');

						Route::get('them/{id}', 'HopDongController@getThem');
						Route::post('them/{id}', 'HopDongController@postThem');

						Route::get('xoa/{id}', 'HopDongController@getXoa');

					});
				Route::group(['prefix' => 'giahan'], function () {
						Route::get('danhsach', 'GiaHanHopDongController@getDanhSach');

						Route::get('sua/{id}', 'GiaHanHopDongController@getSua');
						Route::post('sua/{id}', 'GiaHanHopDongController@postSua');

						Route::get('them/{id}', 'GiaHanHopDongController@getThem');
						Route::post('them/{id}', 'GiaHanHopDongController@postThem');

						Route::get('xoa/{id}', 'GiaHanHopDongController@getXoa');

					});
				Route::group(['prefix' => 'tintuc'], function () {
						Route::get('danhsach', 'TinTucController@getDanhSach');

						Route::get('sua/{id}', 'TinTucController@getSua');
						Route::post('sua/{id}', 'TinTucController@postSua');

						Route::get('them', 'TinTucController@getThem');
						Route::post('them', 'TinTucController@postThem');

						Route::get('xoa/{id}', 'TinTucController@getXoa');

					});
				Route::group(['prefix' => 'thongke'], function () {
						Route::get('all', 'ThongKeController@getThongKeAll');
						Route::get('today', 'ThongKeController@getThongKeToDay');
						Route::get('thisweek', 'ThongKeController@getThongKeThisWeek');
						Route::get('thismonth', 'ThongKeController@getThongKeThisMonth');
						Route::get('thisyear', 'ThongKeController@getThongKeThisYear');
					});
				Route::get('trangchu', 'UserController@getTrangChu');
				Route::get('sua/{id}', 'UserController@getSua2');
				Route::post('sua/{id}', 'UserController@postSua2');
				Route::post('timkiem', 'TimKiemController@postTimKiem');
			});

	});
