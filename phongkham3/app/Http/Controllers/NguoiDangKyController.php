<?php

namespace App\Http\Controllers;

use App\NguoiDangKy;
use Illuminate\Http\Request;

class NguoiDangKyController extends Controller {
	public function getDanhSach() {
		$nguoidangky = NguoiDangKy::all();
		return view('sever.nhanvien.nguoidangky.danhsach', ['nguoidangky' => $nguoidangky]);
	}

	public function getThem() {
		return view('sever.nhanvien.nguoidangky.them');
	}
	public function postThem(Request $request) {
		$this->validate($request,
			[
				'hoten'         => 'required|min:3',
				'email'         => 'required|email|unique:NguoiDangKy,email',
				'password'      => 'required|min:3|max:32',
				'passwordAgain' => 'required|same:password'
			],
			[
				'hoten.required'         => 'Bạn chưa nhập tên người dùng',
				'hoten.min'              => 'Tên người dùng phải có ít nhất 3 ký tự',
				'email.required'         => 'Bạn chưa nhập email',
				'email.email'            => 'Bạn chưa nhập đúng định dạng Email',
				'email.unique'           => 'Email đã tồn tại',
				'password.required'      => 'Bạn chưa nhập password',
				'password.min'           => 'Password phải có ít nhất 3 ký tự',
				'Password.max'           => 'Password có tối đa 32 ký tự',
				'passwordAgain.required' => 'Bạn chưa lại password',
				'passwordAgain.same'     => 'Bạn chưa nhập đúng password',
			]);
		$nguoidangky           = new NguoiDangKy;
		$nguoidangky->hoten    = $request->hoten;
		$nguoidangky->email    = $request->email;
		$nguoidangky->password = bcrypt($request->password);
		$nguoidangky->sdt      = $request->sdt;
		$nguoidangky->diachi   = $request->diachi;
		$nguoidangky->save();

		return redirect('sever/nhanvien/nguoidangky/them')->with('thongbao', 'Bạn đã thêm tài khoản người dùng thành công');

	}

	public function getSua($madangky) {
		$nguoidangky = NguoiDangKy::find($madangky);
		return view('sever.nhanvien.nguoidangky.sua', ['nguoidangky' => $nguoidangky]);
	}
	public function postSua(Request $request, $madangky) {
		$nguoidangky = NguoiDangKy::find($madangky);
		$this->validate($request,
			[
				'hoten' => 'required|min:3|max:32',
			],
			[
				'hoten.required' => 'Bạn chưa nhập tên phòng khám',
				'hoten.min'      => 'Tên người dùng phải có ít nhất 3 ký tự',
				'hoten.max'      => 'Tên người dùng phải có tối đa 32 ký tự',
			]);

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

			$nguoidangky->password = bcrypt($request->passwordnew);

		}
		$nguoidangky->hoten  = $request->hoten;
		$nguoidangky->sdt    = $request->sdt;
		$nguoidangky->diachi = $request->diachi;
		$nguoidangky->save();

		return redirect('sever/nhanvien/nguoidangky/sua/'.$madangky)->with('thongbao', 'Bạn đã sửa thông tin nguời dùng thành công');
	}

	public function getXoa($madangky) {
		$nguoidangky = NguoiDangKy::find($madangky);
		$nguoidangky->delete();
		return redirect('sever/nhanvien/nguoidangky/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
	}
}
