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

class Pk_QLBuongKhamController extends Controller {
	
	public function getTTBuongKham() {
		if (Auth::guard('phongkham')->check()) {
			$id=Auth::guard('phongkham')->user()->id;
			$buongkham = DB::table('buongkham')->select('*')->join('phongkham', 'phongkham.id', '=', 'buongkham.maphongkham')->join('chuyenkhoa', 'chuyenkhoa.id', '=', 'buongkham.machuyenkhoa')->where('maphongkham',$id)->get();
			return view('client.quanlyphongkham.buongkham.danhsach', compact('buongkham'));
		} else {

			return view('page.dangnhap');

		}

	}
	public function getThemTTBK() {
		

		if (Auth::guard('phongkham')->check()) {
			$id= Auth::guard('phongkham')->user()->id;
			$chuyenkhoa = DB::table('chuyenkhoaphongkham')->select('*')->join('chuyenkhoa', 'chuyenkhoa.id', '=', 'chuyenkhoaphongkham.idKhoa')->where('idPhongKham',$id)->get();
			return view('client.quanlyphongkham.buongkham.them',compact('chuyenkhoa'));
		} else {
			return view('page.dangnhap');
		}

	}
	public function postThemTTBK(Request $request) {

		$buongkham           = new BuongKham;
		$buongkham->tenbuongkham = $request->tenbuongkham;
		$buongkham->maphongkham=Auth::guard('phongkham')->user()->id;
		$buongkham->machuyenkhoa=$request->loaick;
		$buongkham->save();

		return redirect()->route('thongtinbuongkham')->with('thongbao', 'Bạn đã thêm buồng khám thành công');

	}
	public function getXoaTTBK($mabuongkham) {
		$buongkham = BuongKham::find($mabuongkham);
		$buongkham->delete();
		return redirect()->route('thongtinbuongkham');
	}
	public function getSuaTTBK($mabuongkham) {
		$buongkham = BuongKham::find($mabuongkham);
		if (Auth::guard('phongkham')->check()) {
			$id= Auth::guard('phongkham')->user()->id;
			$chuyenkhoa = DB::table('chuyenkhoaphongkham')->select('*')->join('chuyenkhoa', 'chuyenkhoa.id', '=', 'chuyenkhoaphongkham.idKhoa')->where('idPhongKham',$id)->get();
		}
		return view('client.quanlyphongkham.buongkham.sua', ['buongkham' => $buongkham ,'chuyenkhoa'=>$chuyenkhoa]);
	}
	public function postSuaTTBK(Request $request, $mabuongkham) {
		$buongkham = BuongKham::find($mabuongkham);
		$buongkham->tenbuongkham = $request->tenbuongkham;
		$buongkham->machuyenkhoa=$request->loaick;
		$buongkham->save();
		return redirect()->route('thongtinbuongkham');
	}
}
