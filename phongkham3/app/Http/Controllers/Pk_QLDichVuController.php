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
use App\DichVu;
use App\User;
use App\PhieuKhamBenh;
use App\DichVuPhongKham;
use Auth;
use DB;
use Hash;

use Illuminate\Http\Request;

class Pk_QLDichVuController extends Controller {
	public function getDSDV() {
		if ((Auth::guard('phongkham')->check())) {
			$dichvu = DichVu::all();
			$id=Auth::guard('phongkham')->user()->id;
			$dichvupk = DB::table('dichvuphongkham')->select('*')->join('dichvu', 'dichvu.id', '=', 'dichvuphongkham.madichvu')->join('phongkham', 'phongkham.id', '=', 'dichvuphongkham.maphongkham')->where('maphongkham', $id)->get();
		
			return view('client.quanlyphongkham.dichvu.danhsach', compact('dichvu','dichvupk'));
		} else {

			return view('page.dangnhap');

		}

	}
	public function postDSDV(Request $request) {
		$this->validate($request,
			[
				
				'dichvu'         => 'required|unique:dichvuphongkham,madichvu',
				
			],
			[
				
				
				'dichvu.unique'           => 'Dịch vụ đã tồn tại',
				
			]);
		$ds              = new DichVuPhongKham;
		$ds->madichvu      = $request->dichvu;
		$ds->maphongkham = Auth::guard('phongkham')->user()->id;
		$ds->save();
		return redirect('danhsachdichvu')->with('thongbao', 'Bạn đã thêm dịch vụ thành công');
	}
	public function getXoaDVPK($madichvu) {
		$dvpk = DichVuPhongKham::find($madichvu);
		$dvpk->delete();
		return redirect('danhsachdichvu')->with('thongbao', 'Bạn đã xóa dịch vụ thành công');
		
	}
	
	
}
