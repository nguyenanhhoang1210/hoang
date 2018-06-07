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

class Pk_QLLichNghiKhamController extends Controller {
	public function getTTLichNghi() {
		if (Auth::guard('phongkham')->check()) {

		    $id=(Auth::guard('phongkham')->user()->id);
			$lichnghi = DB::table('lichnghikham')->select('*')->join('cakham', 'cakham.maca', '=', 'lichnghikham.maca')->where('maphongkham',$id)->get();
			return view('client.quanlyphongkham.lichnghikham.danhsach', compact('lichnghi'));
		} else {

			return view('page.dangnhap');

		}

	}
	public function getThemTTLN() {
		

		if (Auth::guard('phongkham')->check()) {
			$cakham=CaKham::all();
			return view('client.quanlyphongkham.lichnghikham.them',compact('cakham'));
		} else {
			return view('page.dangnhap');
		}

	}
	public function postThemTTLN(Request $request) {

		$lichnghi           = new LichNghiKham;
		$lichnghi->ngaynghi = $request->ngaynghi;
		$lichnghi->maca=$request->cakham;
		$lichnghi->maphongkham=Auth::guard('phongkham')->user()->id;
		$lichnghi->save();

		return redirect('client/quanlyphongkham/lichnghikham/them')->with('thongbao', 'Bạn đã thêm lịch nghỉ khám thành công');

	}
	public function getXoaTTLN($malich) {
		$lichnghi = LichNghiKham::find($malich);
		$lichnghi->delete();

		return redirect()->route('thongtinlichnghi');
	}
	public function getSuaTTLN($malich) {
		

		$lichnghi = LichNghiKham::find($malich);
		$cakham=CaKham::all();
		return view('client.quanlyphongkham.lichnghikham.sua', ['lichnghi' => $lichnghi,'cakham'=>$cakham]);
	}
	public function postSuaTTLN(Request $request, $malich) {
		$lichnghi = LichNghiKham::find($malich);

		$lichnghi->ngaynghi = $request->ngaynghi;
		$lichnghi->maca=$request->cakham;
		$lichnghi->save();
		return redirect()->route('thongtinlichnghi');
	}
	public function getXoaTTKB($makhambenh) {
		$makhambenh = DangKyKhamBenh::find($makhambenh);
		$makhambenh->delete();
		if (Auth::guard('phongkham')->check()) {
			return redirect()                  ->route('qldangkykhambenh');
		} else {
			return redirect()->route('pkqlkhambenh');
		}
	}
	
	
}
