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

class Pk_QLThongTinBenhNhanController extends Controller {
	
	public function getTTBN() {
		if ( Auth::guard('phongkham')->check()) {
		
			$idpk = Auth::guard('phongkham')->user()->id;
			// $dangkykhambenh = DangKyKhamBenh::where('madangky',$idndk)->get();
			$benhnhan = DB::table('dangkykhambenh')->select('*')->join('benhnhan', 'benhnhan.mabenhnhan', '=', 'dangkykhambenh.mabenhnhan')->where('dangkykhambenh.maphongkham', $idpk)->get();

			return view('client.quanlyphongkham.benhnhan.danhsach', compact('benhnhan'));
		} else {

			return view('page.dangnhap');

		}

	}
	public function getSuaTTBN($mabenhnhan) {


		$benhnhan = BenhNhan::find($mabenhnhan);
		return view('client.quanlyphongkham.benhnhan.sua', ['benhnhan' => $benhnhan]);
	}
	public function postSuaTTBN(Request $req, $mabenhnhan) {
		$benhnhan            = BenhNhan::find($mabenhnhan);
		$benhnhan->chandoan = $req->chandoan;
		$benhnhan->tenbenhnhan    = $req->hoten;
		$benhnhan->gioitinh=$req->gender;
		$benhnhan->sdt      = $req->sdt;
		$benhnhan->diachi   = $req->diachi;
		$benhnhan->save();
		return redirect()->route('thongtinbenhnhan');
	}
	
}
