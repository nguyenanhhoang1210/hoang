<?php

namespace App\Http\Controllers;

use App\DanhMucTinTuc;

use Illuminate\Http\Request;

class DanhMucTinTucController extends Controller {
	public function getDanhSach() {
		$danhmuctintuc = DanhMucTinTuc::all();
		return view('sever.nhanvien.danhmuctintuc.danhsach', ['danhmuctintuc' => $danhmuctintuc]);
	}

	public function getThem() {
		return view('sever.nhanvien.danhmuctintuc.them');
	}
	public function postThem(Request $request) {
		$this->validate($request,
			[
				'Ten' => 'required|min:3|max:50|unique:danhmuctintuc,Ten'
			],

			[
				'Ten.required' => 'Bạn chưa nhập tên danh mục tin tức',
				'Ten.min'      => 'Tên danh mục tin tức có độ dài từ 3 dến 50 ký tự',
				'Ten.max'      => 'Tên danh mục tin tức có độ dài từ 3 dến 50 ký tự',
				'Ten.unique'   => 'Tên danh mục tin tức đã tồn tại '
			]);
		$danhmuctintuc      = new DanhMucTinTuc;
		$danhmuctintuc->Ten = $request->Ten;
		$danhmuctintuc->save();

		return redirect('sever/nhanvien/danhmuctintuc/them')->with('thongbao', 'Bạn đã thêm tên danh mục tin tức thành công');
	}

	public function getSua($id) {
		$danhmuctintuc = danhmuctintuc::find($id);
		return view('sever.nhanvien.danhmuctintuc.sua', ['danhmuctintuc' => $danhmuctintuc]);
	}
	public function postSua(Request $request, $id) {
		$danhmuctintuc = DanhMucTinTuc::find($id);
		$this->validate($request,

			[
				'Ten' => 'required|min:3|max:50|unique:danhmuctintuc,Ten'
			],

			[
				'Ten.required' => 'Bạn chưa nhập tên danh mục tin tức',
				'Ten.min'      => 'Tên danh mục tin tức có độ dài từ 3 dến 50 ký tự',
				'Ten.max'      => 'Tên danh mục tin tức có độ dài từ 3 dến 50 ký tự',
				'Ten.unique'   => 'Tên danh mục tin tức đã tồn tại '
			]);
		$danhmuctintuc->Ten = $request->Ten;
		$danhmuctintuc->save();

		return redirect('sever/nhanvien/danhmuctintuc/sua/'.$id)->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$danhmuctintuc = DanhMucTinTuc::find($id);
		$danhmuctintuc->delete();
		return redirect('sever/nhanvien/danhmuctintuc/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
	}
}
