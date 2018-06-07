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

class Pk_QLThongTinPkController extends Controller {
	
	public function getTTPK() {
		if (Auth::guard('phongkham')->check()) {
			$mapk = Auth::guard('phongkham')->user()->id;
		}
		 else {
			Auth::logout();

			return view('page.dangnhap');
		}
		$pk = PhongKham::where('id', $mapk)->get();
		return view('client.quanlyphongkham.phongkham.danhsach', compact('pk'));
	}
	public function getSuaTTPK($id) {
		
		$pk   = PhongKham::find($id);
		return view('client.quanlyphongkham.phongkham.sua', ['pk' => $pk]);
	}
	public function postSuaTTPK(Request $request, $id) {
		$pk = PhongKham::find($id);
		$this->validate($request,
			[
				'name' => 'required|min:3|max:32',
			],
			[
				'name.required' => 'Bạn chưa nhập tên người dùng',
				'name.min'      => 'Tên người dùng phải có ít nhất 3 ký tự',
				'name.max'      => 'Tên người dùng phải có tối đa 32 ký tự',
			]);
		$pk->tenphongkham = $request->name;

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

			$pk->password = bcrypt($request->passwordnew);

		}
		if ($request->hasFile('Hinh')) {
			$file = $request->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if ($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png') {
				return redirect()->back()->with('loihinh', 'Bạn chỉ được chọn file hình có định dạng (jpg,jpeg,png)');
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while (file_exists("source/img/".$Hinh)) {
				$Hinh = str_random(4)."_".$name;
			}
			$file->move("source/img/", $Hinh);
			unlink("source/img/".$pk->hinhanh);
			$pk->hinhanh = $Hinh;
		}

		$pk->tenphongkham = $request->name;
		$pk->Sdt= $request->sdt;
		$pk->diaChiChiTiet=$request->diachi;
		$pk->ghichu=$request->ghichu;
		
		
		$pk->save();
		return redirect()->route('thongtinphongkham')->with('thongbao', 'Bạn đã sửa thông tin phòng khám thành công');
	}
}
