<?php

namespace App\Http\Controllers;

use App\LoaiDichVu;

use Illuminate\Http\Request;

class LoaiDichVuController extends Controller {
	public function getDanhSach() {
		$loaidichvu = LoaiDichVu::all();
		return view('sever.nhanvien.loaidichvu.danhsach', ['loaidichvu' => $loaidichvu]);
	}

	public function getThem() {
		return view('sever.nhanvien.loaidichvu.them');
	}
	public function postThem(Request $request) {
		$this->validate($request,
			[
				'Ten' => 'required|min:3|max:50|unique:LoaiDichVu,Ten'
			],

			[
				'Ten.required' => 'Bạn chưa nhập tên loại Dịch Vụ',
				'Ten.min'      => 'Tên loại dịch vụ có độ dài từ 3 dến 50 ký tự',
				'Ten.max'      => 'Tên loại dịch vụ có độ dài từ 3 dến 50 ký tự',
				'Ten.unique'   => 'Tên loại loaidịch vụ đã tồn tại '
			]);
		$loaidichvu      = new LoaiDichVu;
		$loaidichvu->Ten = $request->Ten;
		$loaidichvu->save();

		return redirect('sever/nhanvien/loaidichvu/them')->with('thongbao', 'Bạn đã thêm tên loại dịch vụ thành công');
	}

	public function getSua($id) {
		$loaidichvu = LoaiDichVu::find($id);
		return view('sever.nhanvien.loaidichvu.sua', ['loaidichvu' => $loaidichvu]);
	}
	public function postSua(Request $request, $id) {
		$loaidichvu = LoaiDichVu::find($id);
		$this->validate($request,

			[
				'Ten' => 'required|min:3|max:50|unique:LoaiDichVu,Ten'
			],

			[
				'Ten.required' => 'Bạn chưa nhập tên loại Dịch Vụ',
				'Ten.min'      => 'Tên loại dịch vụ có độ dài từ 3 dến 50 ký tự',
				'Ten.max'      => 'Tên loại dịch vụ có độ dài từ 3 dến 50 ký tự',
				'Ten.unique'   => 'Tên loại dịch vụ đã tồn tại '
			]);
		$loaidichvu->Ten = $request->Ten;
		$loaidichvu->save();

		return redirect('sever/nhanvien/loaidichvu/sua/'.$id)->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$loaidichvu = LoaiDichVu::find($id);
		$loaidichvu->delete();
		return redirect('sever/nhanvien/loaidichvu/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
	}
}
