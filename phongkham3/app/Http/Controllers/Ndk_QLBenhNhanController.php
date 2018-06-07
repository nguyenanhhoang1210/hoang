<?php

namespace App\Http\Controllers;
use App\BenhNhan;
use App\ChuyenKhoa;
use App\LichNghiKham;
use App\ChuyenKhoaPhongKham;
use App\DangKyKhamBenh;
use App\CaKham;
use App\LoaiNhanVien;
use App\NguoiDangKy;
use App\NhanVienPhongKham;
use App\BuongKham;
use App\phongkham;
use App\User;
use App\PhieuKhamBenh;
use Auth;
use DB;
use Hash;

use Illuminate\Http\Request;

class Ndk_QLBenhNhanController extends Controller {
	
	public function getTTBN() {
	

		if ((Auth::guard('nguoidangky')->check())) {
			$madangky = Auth::guard('nguoidangky')->user()->madangky;
		} else {

			Auth::guard('nhanvienphongkham')->logout();
			return view('page.dangnhap');

		}
		$nguoidangky = NguoiDangKy::where('madangky', $madangky)->get();
		$idndk       = NguoiDangKy::where('madangky', $madangky)->first()->madangky;
		// $dangkykhambenh = DangKyKhamBenh::where('madangky',$idndk)->get();
		$dangkykhambenh = DB::table('dangkykhambenh')->select('*')->join('benhnhan', 'benhnhan.mabenhnhan', '=', 'dangkykhambenh.mabenhnhan')->where('madangky', $idndk)->get();

		return view('client.nguoidangky.benhnhan.danhsach', compact('nguoidangky', 'dangkykhambenh'));
	}
	

	
	
	
	
	


}
