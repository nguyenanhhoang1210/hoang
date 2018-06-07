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

class Ndk_QLThongTinDangKyController extends Controller {
	
	public function getTTKB() {
		if ((Auth::guard('nguoidangky')->check())) {
			$madangky = Auth::guard('nguoidangky')->user()->madangky;
		} else {

			return view('page.dangnhap');

		}

		$idndk = NguoiDangKy::where('madangky', $madangky)->first()->madangky;
		// $dangkykhambenh = DangKyKhamBenh::where('madangky',$idndk)->get();
		$dangkykhambenh = DB::table('dangkykhambenh')->select('*')->join('benhnhan', 'benhnhan.mabenhnhan', '=', 'dangkykhambenh.mabenhnhan')->join('cakham', 'cakham.maca', '=', 'dangkykhambenh.maca')->join('nguoidangky', 'nguoidangky.madangky', '=', 'dangkykhambenh.madangky')->join('phongkham', 'phongkham.id', '=', 'dangkykhambenh.maphongkham')->where('dangkykhambenh.madangky', $idndk)->get();

		return view('client.nguoidangky.lichdangky.danhsach', compact('dangkykhambenh'));
	}
	
	
	public function getXoaTTKB($makhambenh) {
		$makhambenh = DangKyKhamBenh::find($makhambenh);
		$makhambenh->delete();
		
			return redirect()->route('qldangkykhambenh');
	
	}
	
}
