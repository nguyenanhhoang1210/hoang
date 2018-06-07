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

class Pk_QLNhanVienPKController extends Controller {
	
	public function getNVPKQuanLy() {
		

		if  (Auth::guard('phongkham')->check()) {
			// $maphongkham=Auth::guard('phongkham')->user()->maphongkham;
			$id=Auth::guard('phongkham')->user()->id;
			$nvpk=NhanVienPhongKham::where('id_phongkham',$id)->get();
			
		} else {


			return view('page.dangnhap');
		}
		// $nvpk = NhanVienPhongKham::where('maphongkham',$maphongkham)->get();

		return view('client.quanlyphongkham.nhanvien.danhsach', compact('nvpk'));
	}
	public function getXoaNVPK($manv) {
		$NhanVienPhongKham = NhanVienPhongKham::find($manv);
		$NhanVienPhongKham->delete();

		return redirect()->route('nvphongkham_quanly');
	}
	public function getThemNVPK() {
		
		$loainv = LoaiNhanVien::all();
		if (Auth::guard('phongkham')->check() ) {
			return view('client.quanlyphongkham.nhanvien.them', ['loainv' => $loainv]);
		} else {
			return view('page.dangnhap');
		}

	}
	public function postThemNVPK(Request $request) {
		$this->validate($request,
			[
				'name'          => 'required|min:3',
				'email'         => 'required|email|unique:nhanvienphongkham,email',
				'password'      => 'required|min:3|max:32',
				'passwordAgain' => 'required|same:password'
			],
			[
				'name.required'          => 'Bạn chưa nhập tên người dùng',
				'name.min'               => 'Tên người dùng phải có ít nhất 3 ký tự',
				'email.required'         => 'Bạn chưa nhập email',
				'email.email'            => 'Bạn chưa nhập đúng định dạng Email',
				'email.unique'           => 'Email đã tồn tại',
				'password.required'      => 'Bạn chưa nhập password',
				'password.min'           => 'Password phải có ít nhất 3 ký tự',
				'Password.max'           => 'Password có tối đa 32 ký tự',
				'passwordAgain.required' => 'Bạn chưa lại password',
				'passwordAgain.same'     => 'Bạn chưa nhập đúng password',
			]);
		$nvpk              = new NhanVienPhongKham;
		$nvpk->tennhanvien = $request->name;
		$nvpk->email       = $request->email;
		$nvpk->password    = Hash::make($request->password);
		$nvpk->maloai      = $request->loainv;
		$nvpk->id_phongkham      = Auth::guard('phongkham')->user()->id;
		$nvpk->save();

		return redirect('client/quanlyphongkham/nhanvien/them')->with('thongbao', 'Bạn đã thêm user thành công');

	}
	public function getSuaNVPK($manv) {
		

		$loainv = LoaiNhanVien::all();
		$nvpk   = NhanVienPhongKham::find($manv);
		return view('client.quanlyphongkham.nhanvien.sua', ['nvpk' => $nvpk, 'loainv' => $loainv]);
	}
	public function postSuaNVPK(Request $request, $manv) {
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
		$nvpk->email  = $request->email;
		$nvpk->maloai = $request->loainv;

		$nvpk->save();
		return redirect()->route('nvphongkham_quanly')->with('thongbao', 'Bạn đã sửa thông tin user thành công');
	}
	
}
