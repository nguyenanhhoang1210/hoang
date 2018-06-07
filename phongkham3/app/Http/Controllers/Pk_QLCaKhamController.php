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

class Pk_QLCaKhamController extends Controller {
	
	public function getTTCaKham() {
		if (Auth::guard('phongkham')->check()) {
		
			$cakham = CaKham::all();
			return view('client.quanlyphongkham.cakham.danhsach', compact('cakham'));
		} else {

			return view('page.dangnhap');

		}

	}
}
