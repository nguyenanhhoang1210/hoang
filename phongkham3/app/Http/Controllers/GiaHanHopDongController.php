<?php

namespace App\Http\Controllers;

use App\GiaHanHopDong;
use App\HopDong;

use Illuminate\Http\Request;

class GiaHanHopDongController extends Controller {
	public function getDanhSach1() {
		$giahan = GiaHanHopDong::all();
		return view('sever.admin.giahanhopdong.danhsach', ['giahan' => $giahan]);
	}
	public function getThem1($id) {
		$hopdong = HopDong::find($id);
		return view('sever.admin.giahanhopdong.them', ['hopdong' => $hopdong]);
	}

	public function postThem1(Request $request, $id) {
		$this->validate($request,

			[
				'maGH'   => 'min:1|max:50|unique:GiaHanHopDong,maGH',
				'giatri' => 'regex:/^[0-9]+$/u',
			],

			[
				'maGH.min'     => 'Mã gia hạn hợp đồng có độ dài từ 1 dến 50 ký tự',
				'maGH.max'     => 'Mã gia hạn hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maGH.unique'  => 'Mã gia hạn hợp đồng đã tồn tại ',
				'giatri.regex' => 'Giá trị chỉ được nhập số'
			]);
		$giahan         = new GiaHanHopDong;
		$giahan->maGH   = $request->maGH;
		$giahan->maHD   = $id;
		$giahan->giatri = $request->giatri;
		$giahan->ngayBD = $request->ngayBD;
		$giahan->ngayKT = $request->ngayKT;
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today = date("Y-m-d");
		if (strtotime($today) < strtotime($request->ngayBD)) {
			$giahan->trangthai = "Chưa Hiệu Lực";
		}
		if (strtotime($today) == strtotime($request->ngayBD) || strtotime($today) == strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayBD) && strtotime($today) < strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hết Hiệu Lực";
		}

		$giahan->save();

		return redirect('sever/admin/giahan/danhsach')->with('thongbao', 'Bạn đã thêm gia hạn thành công');
	}
	public function getSua1($id) {
		$giahan = GiaHanHopDong::find($id);

		return view('sever.admin.giahanhopdong.sua', ['giahan' => $giahan]);
	}
	public function postSua1(Request $request, $id) {
		$giahan = GiaHanHopDong::find($id);
		$this->validate($request,

			[
				'maGH'   => 'min:1|max:50|unique:GiaHanHopDong,maGH',
				'giatri' => 'regex:/^[0-9]+$/u',
			],

			[
				'maGH.min'     => 'Mã gia hạn hợp đồng có độ dài từ 1 dến 50 ký tự',
				'maGH.max'     => 'Mã gia hạn hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maGH.unique'  => 'Mã gia hạn hợp đồng đã tồn tại ',
				'giatri.regex' => 'Giá trị chỉ được nhập số'
			]);
		$giahan->giatri = $request->giatri;
		$giahan->ngayBD = $request->ngayBD;
		$giahan->ngayKT = $request->ngayKT;
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today = date("Y-m-d");
		if (strtotime($today) < strtotime($request->ngayBD)) {
			$giahan->trangthai = "Chưa Hiệu Lực";
		}

		if (strtotime($today) == strtotime($request->ngayBD) || strtotime($today) == strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayBD) && strtotime($today) < strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hết Hiệu Lực";
		}
		$giahan->save();

		return redirect('sever/admin/giahan/danhsach')->with('thongbao', 'Bạn đã cập nhật gia hạn thành công');
	}
	public function getXoa1($id) {
		$giahan = GiaHanHopDong::find($id);
		$giahan->delete();
		return redirect('sever/admin/giahan/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
	}
	public function getDanhSach() {
		$giahan = GiaHanHopDong::all();
		return view('sever.nhanvien.giahanhopdong.danhsach', ['giahan' => $giahan]);
	}
	public function getThem($id) {
		$hopdong = HopDong::find($id);
		return view('sever.nhanvien.giahanhopdong.them', ['hopdong' => $hopdong]);
	}

	public function postThem(Request $request, $id) {
		$this->validate($request,

			[
				'maGH'   => 'min:1|max:50|unique:GiaHanHopDong,maGH',
				'giatri' => 'regex:/^[0-9]+$/u',
			],

			[
				'maGH.min'     => 'Mã gia hạn hợp đồng có độ dài từ 1 dến 50 ký tự',
				'maGH.max'     => 'Mã gia hạn hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maGH.unique'  => 'Mã gia hạn hợp đồng đã tồn tại ',
				'giatri.regex' => 'Giá trị chỉ được nhập số'
			]);
		$giahan         = new GiaHanHopDong;
		$giahan->maGH   = $request->maGH;
		$giahan->maHD   = $id;
		$giahan->giatri = $request->giatri;
		$giahan->ngayBD = $request->ngayBD;
		$giahan->ngayKT = $request->ngayKT;
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today = date("Y-m-d");
		if (strtotime($today) < strtotime($request->ngayBD)) {
			$giahan->trangthai = "Chưa Hiệu Lực";
		}
		if (strtotime($today) == strtotime($request->ngayBD) || strtotime($today) == strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayBD) && strtotime($today) < strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hết Hiệu Lực";
		}

		$giahan->save();

		return redirect('sever/nhanvien/giahan/danhsach')->with('thongbao', 'Bạn đã thêm gia hạn thành công');
	}
	public function getSua($id) {
		$giahan = GiaHanHopDong::find($id);

		return view('sever.nhanvien.giahanhopdong.sua', ['giahan' => $giahan]);
	}
	public function postSua(Request $request, $id) {
		$giahan = GiaHanHopDong::find($id);
		$this->validate($request,

			[
				'maGH'   => 'min:1|max:50|unique:GiaHanHopDong,maGH',
				'giatri' => 'regex:/^[0-9]+$/u',
			],

			[
				'maGH.min'     => 'Mã gia hạn hợp đồng có độ dài từ 1 dến 50 ký tự',
				'maGH.max'     => 'Mã gia hạn hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maGH.unique'  => 'Mã gia hạn hợp đồng đã tồn tại ',
				'giatri.regex' => 'Giá trị chỉ được nhập số'
			]);
		$giahan->giatri = $request->giatri;
		$giahan->ngayBD = $request->ngayBD;
		$giahan->ngayKT = $request->ngayKT;
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today = date("Y-m-d");
		if (strtotime($today) < strtotime($request->ngayBD)) {
			$giahan->trangthai = "Chưa Hiệu Lực";
		}

		if (strtotime($today) == strtotime($request->ngayBD) || strtotime($today) == strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayBD) && strtotime($today) < strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayKT)) {
			$giahan->trangthai = "Hết Hiệu Lực";
		}
		$giahan->save();

		return redirect('sever/nhanvien/giahan/danhsach')->with('thongbao', 'Bạn đã cập nhật gia hạn thành công');
	}
	public function getXoa($id) {
		$giahan = GiaHanHopDong::find($id);
		$giahan->delete();
		return redirect('sever/nhanvien/giahan/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
	}
}
