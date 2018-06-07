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

class Pk_QLChuyenKhoaController extends Controller {
	public function getDSCK() {
		if ((Auth::guard('phongkham')->check())) {
			$chuyenkhoa = ChuyenKhoa::all();
			$id=Auth::guard('phongkham')->user()->id;
			$chuyenkhoapk = DB::table('chuyenkhoaphongkham')->select('*')->join('chuyenkhoa', 'chuyenkhoa.id', '=', 'chuyenkhoaphongkham.idKhoa')->join('phongkham', 'phongkham.id', '=', 'chuyenkhoaphongkham.idPhongKham')->where('idPhongKham', $id)->get();
		
			return view('client.quanlyphongkham.chuyenkhoa.danhsach', compact('chuyenkhoa','chuyenkhoapk'));
		} else {

			return view('page.dangnhap');

		}

	}
	public function postDSCK(Request $request) {
		$this->validate($request,
			[
				
				'idKhoa'        => 'required|unique:chuyenkhoaphongkham,idKhoa',
				
			],
			[
				
				
				'IdKhoa.unique'           => 'Chuyên khoa đã tồn tại',
				
			]);
		$ds              = new ChuyenKhoaPhongKham;
		$ds->idKhoa      = $request->idKhoa;
		$ds->idPhongKham = Auth::guard('phongkham')->user()->id;
		$ds->save();
		return redirect('danhsachchuyenkhoa')->with('thongbao', 'Bạn đã thêm chuyên khoa thành công');
	}
	public function getXoaCKPK($idckpk) {
		$ckpk = ChuyenKhoaPhongKham::find($idckpk);
		
		$ckpk->delete();
		return redirect('danhsachchuyenkhoa')->with('thongbao', 'Bạn đã thêm chuyên khoa thành công');
		
	}
	
	
}
