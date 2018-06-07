<?php

namespace App\Http\Controllers;

use App\DichVu;
use App\LoaiDichVu;

use Illuminate\Http\Request;

class DichVuController extends Controller {
	public function getDanhSach() {
		$dichvu = DichVu::all();
		return view('sever.nhanvien.dichvu.danhsach', ['dichvu' => $dichvu]);
	}

	public function getThem() {
		$loaidichvu = LoaiDichVu::all();
		return view('sever.nhanvien.dichvu.them', ['loaidichvu' => $loaidichvu]);
	}
	public function postThem(Request $request) {
		$this->validate($request,

			[
				'Ten'    => 'required|min:1|max:50|unique:DichVu,Ten',
				'idLoai' => 'required',
			],

			[
				'Ten.required'    => 'Bạn chưa nhập tên thể loại',
				'Ten.min'         => 'Tên dịch vụ có độ dài từ 3 dến 50 ký tự',
				'Ten.max'         => 'Tên dịch vụ có độ dài từ 3 dến 50 ký tự',
				'Ten.unique'      => 'Tên dịch vụ đã tồn tại ',
				'idLoai.required' => 'Bạn chưa chọn loại dịch vụ'
			]);
		$dichvu         = new DichVu;
		$dichvu->Ten    = $request->Ten;
		$dichvu->idLoai = $request->idLoai;
		$dichvu->save();

		return redirect('sever/nhanvien/dichvu/them')->with('thongbao', 'Bạn đã thêm dịch vụ thành công');
	}

	public function getSua($id) {
		$loaidichvu = LoaiDichVu::all();
		$dichvu     = DichVu::find($id);
		
		return view('sever.nhanvien.dichvu.sua', ['dichvu' => $dichvu, 'loaidichvu' => $loaidichvu]);
	}
	public function postSua(Request $request, $id) {
		$dichvu = DichVu::find($id);
		$this->validate($request,

			[
				'Ten'    => 'required|min:1|max:50|unique:DichVu,Ten',
				'idLoai' => 'required'
			],

			[
				'Ten.required'    => 'Bạn chưa nhập tên thể loại',
				'Ten.min'         => 'Tên dịch vụ có độ dài từ 3 dến 50 ký tự',
				'Ten.max'         => 'Tên dịch vụ có độ dài từ 3 dến 50 ký tự',
				'Ten.unique'      => 'Tên dịch vụ đã tồn tại ',
				'idLoai.required' => 'Bạn chưa chọn loại dịch vụ'
			]);
		$dichvu->Ten    = $request->Ten;
		$dichvu->idLoai = $request->idLoai;
		$dichvu->save();

		return redirect('sever/nhanvien/dichvu/sua/'.$id)->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$dichvu = DichVu::find($id);
		$dichvu->delete();
		return redirect('sever/nhanvien/dichvu/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
	}
	public function getGioiThieu($id) {
		$dichvu = DichVu::find($id);
		return view('sever.nhanvien.dichvu.gioithieu', ['dichvu' => $dichvu]);
	}
}
