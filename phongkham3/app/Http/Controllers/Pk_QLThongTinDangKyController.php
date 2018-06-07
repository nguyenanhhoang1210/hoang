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
use Auth;
use DB;
use Hash;

use Illuminate\Http\Request;

class Pk_QLThongTinDangKyController extends Controller {
	
	public function getPKTTKB() {
		if ( Auth::guard('phongkham')->check()) {
		
			$idpk = Auth::guard('phongkham')->user()->id;
			// $dangkykhambenh = DangKyKhamBenh::where('madangky',$idndk)->get();
			$dangkykhambenh = DB::table('dangkykhambenh')->select('*')->join('benhnhan', 'benhnhan.mabenhnhan', '=', 'dangkykhambenh.mabenhnhan')->join('cakham', 'cakham.maca', '=', 'dangkykhambenh.maca')->join('nguoidangky', 'nguoidangky.madangky', '=', 'dangkykhambenh.madangky')->where('dangkykhambenh.maphongkham', $idpk)->get();

			return view('client.quanlyphongkham.dangkykhambenh.danhsach', compact('dangkykhambenh'));
		} else {

			return view('page.dangnhap');

		}

	}
	public function getSuaTTKB($makhambenh) {


		$khambenh = DangKyKhamBenh::find($makhambenh);
		return view('client.quanlyphongkham.dangkykhambenh.sua', ['khambenh' => $khambenh]);
	}
	public function postSuaTTKB(Request $request, $makhambenh) {
		$khambenh            = DangKyKhamBenh::find($makhambenh);
		$khambenh->tinhtrang = $request->tinhtrang;

		$khambenh->save();
		return redirect()->route('pkqlkhambenh');
	}
	public function getXoaTTKB($makhambenh) {
		$makhambenh = DangKyKhamBenh::find($makhambenh);
		$makhambenh->delete();
		
			return redirect()->route('pkqlkhambenh');
		
	}
}
