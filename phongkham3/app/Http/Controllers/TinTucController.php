<?php

namespace App\Http\Controllers;
use App\DanhMucTinTuc;
use App\TinTuc;
use Illuminate\Http\Request;

class TinTucController extends Controller {
	public function getDanhSach() {
		//$tintuc = TinTuc::orderby('id', 'DESC')->get();
		$tintuc = TinTuc::all();
		return view('sever.nhanvien.tintuc.danhsach', ['tintuc' => $tintuc]);
	}
	public function getThem() {
		$danhmuctintuc = DanhMucTinTuc::all();
		return view('sever.nhanvien.tintuc.them', ['danhmuctintuc' => $danhmuctintuc]);
	}
	public function postThem(Request $request) {
		$this->validate($request, [
				'TieuDe'  => 'required|min:3|unique:TinTuc,tieude',
				'TomTat'  => 'required|min:3',
				'NoiDung' => 'required'
			], [
				'TieuDe.required'  => 'Bạn chưa nhập tiêu đề',
				'TieuDe.min'       => 'Tiêu đề phải có ít nhất 3 ký tự',
				'TieuDe.unique'    => 'Tên tiêu đề đã tồn tại',
				'TomTat.required'  => 'Bạn chưa nhập tóm tắt',
				'TomTat.min'       => 'Tóm tắt phải có ít nhất 3 ký tự',
				'NoiDung.required' => 'Bạn chưa nhập nội dung'
			]);
		$tintuc            = new TinTuc;
		$tintuc->idDanhMuc = $request->idDanhMuc;
		$tintuc->TieuDe    = $request->TieuDe;
		$tintuc->TomTat    = $request->TomTat;
		$tintuc->NoiDung   = $request->NoiDung;

		if ($request->hasFile('Hinh')) {
			$file = $request->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if ($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png') {
				return redirect('sever/nhanvien/tintuc/them')->with('loihinh', 'Bạn chỉ được chọn file hình có định dạng (jpg,jpeg,png)');
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(5)."_".$name;
			while (file_exists("upload/tintuc/".$Hinh)) {
				$Hinh = str_random(5)."_".$name;
			}
			$file->move("upload/tintuc/", $Hinh);
			$tintuc->Hinh = $Hinh;
		} else {
			$tintuc->Hinh = "";
		}
		$tintuc->save();

		return redirect('sever/nhanvien/tintuc/them')->with('thongbao', 'Bạn đã thêm tin tức thành công');

	}
	public function getSua($id) {
		$tintuc        = TinTuc::find($id);
		$danhmuctintuc = DanhMucTinTuc::all();
		return view('sever.nhanvien.tintuc.sua', ['tintuc' => $tintuc, 'danhmuctintuc' => $danhmuctintuc]);

	}
	public function postSua(Request $request, $id) {
		$tintuc = TinTuc::find($id);
		$this->validate($request, [
				'TieuDe'  => 'required|min:3',
				'TomTat'  => 'required|min:3',
				'NoiDung' => 'required'
			], [
				'TieuDe.required'  => 'Bạn chưa nhập tiêu đề',
				'TieuDe.min'       => 'Tiêu đề phải có ít nhất 3 ký tự',
				'TomTat.required'  => 'Bạn chưa nhập tóm tắt',
				'TomTat.min'       => 'Tóm tắt phải có ít nhất 3 ký tự',
				'NoiDung.required' => 'Bạn chưa nhập nội dung'
			]);
		$tintuc->idDanhMuc = $request->idDanhMuc;
		$tintuc->TieuDe    = $request->TieuDe;
		$tintuc->TomTat    = $request->TomTat;
		$tintuc->NoiDung   = $request->NoiDung;

		if ($request->hasFile('Hinh')) {
			$file = $request->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if ($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png') {
				return redirect('sever/nhanvien/tintuc/sua/'.$id)->with('loihinh', 'Bạn chỉ được chọn file hình có định dạng (jpg,jpeg,png)');
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(5)."_".$name;
			while (file_exists("upload/tintuc/".$Hinh)) {
				$Hinh = str_random(5)."_".$name;
			}
			$file->move("upload/tintuc/", $Hinh);
			unlink("upload/tintuc/".$tintuc->Hinh);
			$tintuc->Hinh = $Hinh;
		}
		$tintuc->save();

		return redirect('sever/nhanvien/tintuc/sua/'.$id)->with('thongbao', 'Bạn đã sửa tin tức thành công');

	}
	public function getXoa($id) {
		$tintuc = TinTuc::find($id);
		$tintuc->delete();

		return redirect('sever/nhanvien/tintuc/danhsach')->with('thongbaoloi', 'Bạn đã xoá tin thành công');
	}
}
