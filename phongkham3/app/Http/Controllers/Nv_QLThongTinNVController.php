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

class Nv_QLThongTinNVController extends Controller {
	
	public function getTTNV() {
		if (Auth::guard('nhanvienphongkham')->check()) {
			$manv = Auth::guard('nhanvienphongkham')->user()->manv;
		}
		 else {
			Auth::logout();

			return view('page.dangnhap');
		}
		$nvpk = NhanVienPhongKham::where('manv', $manv)->get();
		return view('client.nhanvienphongkham.qlthongtin.danhsach', compact('nvpk'));
	}
	public function getSuaTTNV($manv) {
	
		$maloai = Auth::guard('nhanvienphongkham')->user()->maloai;
		$loainv = LoaiNhanVien::where('maloai', $maloai)->get();
		$nvpk   = NhanVienPhongKham::find($manv);
		return view('client.nhanvienphongkham.qlthongtin.sua', ['nvpk' => $nvpk,  'loainv' => $loainv]);
	}
	public function postSuaTTNV(Request $request, $manv) {
		$nvpk = NhanVienPhongKham::find($manv);
		$this->validate($request,
			[
				'name' => 'required|min:3|max:32',
			],
			[
				'name.required' => 'Bạn chưa nhập tên người dùng',
				'name.min'      => 'Tên người dùng phải có ít nhất 3 ký tự',
				'name.max'      => 'Tên người dùng phải có tối đa 32 ký tự',
			]);
		$nvpk->tennhanvien = $request->name;

		if ($request->changePassword == "on") {
			$this->validate($request,
				[
					'passwordnew'      => 'required|min:3|max:32',
					'passwordnewAgain' => 'required|same:passwordnew'
				],
				[
					'passwordnew.required'      => 'Bạn chưa nhập password',
					'passwordnew.min'           => 'Password phải có ít nhất 3 ký tự',
					'Passwordnew.max'           => 'Password có tối đa 32 ký tự',
					'passwordnewAgain.required' => 'Bạn chưa lại password',
					'passwordnewAgain.same'     => 'Bạn chưa nhập đúng password',
				]);

			$nvpk->password = bcrypt($request->passwordnew);

		}

		$nvpk->email = $request->email;
		$nvpk->save();
		return redirect()->route('thongtinnv')->with('thongbao', 'Bạn đã sửa thông tin user thành công');
	}
}
