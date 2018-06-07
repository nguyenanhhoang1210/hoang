<?php

namespace App\Http\Controllers;

use App\ChuyenKhoa;

use Illuminate\Http\Request;

class ChuyenKhoaController extends Controller {
	public function getDanhSach() {
		$chuyenkhoa = ChuyenKhoa::all();
		return view('sever.nhanvien.chuyenkhoa.danhsach', ['chuyenkhoa' => $chuyenkhoa]);
	}

	public function getThem() {
		return view('sever.nhanvien.chuyenkhoa.them');
	}
	public function postThem(Request $request) {
		$this->validate($request,
			[
				'Ten' => 'required|min:3|max:50|unique:ChuyenKhoa,Ten'
			],

			[
				'Ten.required' => 'Bạn chưa nhập tên Chuyên Khoa',
				'Ten.min'      => 'Tên Chuyên Khoa có độ dài từ 3 dến 50 ký tự',
				'Ten.max'      => 'Tên Chuyên Khoa có độ dài từ 3 dến 50 ký tự',
				'Ten.unique'   => 'Tên Chuyên Khoa đã tồn tại '
			]);
		$chuyenkhoa      = new ChuyenKhoa;
		$chuyenkhoa->Ten = $request->Ten;
		$chuyenkhoa->save();

		return redirect('sever/nhanvien/chuyenkhoa/them')->with('thongbao', 'Bạn đã thêm chuyên khoa thành công');
	}

	public function getSua($id) {
		$chuyenkhoa = ChuyenKhoa::find($id);
		return view('sever.nhanvien.chuyenkhoa.sua', ['chuyenkhoa' => $chuyenkhoa]);
	}
	public function postSua(Request $request, $id) {
		$chuyenkhoa = ChuyenKhoa::find($id);
		$this->validate($request,
			[
				'Ten' => 'required|min:3|max:50|unique:ChuyenKhoa,Ten'
			],

			[
				'Ten.required' => 'Bạn chưa nhập tên Chuyên Khoa',
				'Ten.min'      => 'Tên Chuyên Khoa có độ dài từ 3 dến 50 ký tự',
				'Ten.max'      => 'Tên Chuyên Khoa có độ dài từ 3 dến 50 ký tự',
				'Ten.unique'   => 'Tên Chuyên Khoa đã tồn tại '
			]);
		$chuyenkhoa->Ten = $request->Ten;
		$chuyenkhoa->save();

		return redirect('sever/nhanvien/chuyenkhoa/sua/'.$id)->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$chuyenkhoa = ChuyenKhoa::find($id);
		$chuyenkhoa->delete();
		return redirect('sever/nhanvien/chuyenkhoa/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
	}
}
