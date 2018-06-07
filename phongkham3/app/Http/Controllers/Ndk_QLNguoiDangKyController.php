<?php

namespace App\Http\Controllers;
use App\BenhNhan;
use App\DangKyKhamBenh;
use App\CaKham;
use App\LoaiNhanVien;
use App\NguoiDangKy;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
class Ndk_QLNguoiDangKyController extends Controller {
	
	public function getQuanLyNDK() {

		if ((Auth::guard('nguoidangky')->check())) {
			$madangky = Auth::guard('nguoidangky')->user()->madangky;
		} else {

			return view('page.dangnhap');

		}
		$nguoidangky = NguoiDangKy::where('madangky', $madangky)->get();

		return view('client.nguoidangky.nguoidangky.danhsach', compact('nguoidangky'));
	}
	

	public function getEditDK($madangky) {
		
		$ndk   = NguoiDangKy::find($madangky);
		return view('client.nguoidangky.nguoidangky.sua', ['ndk' => $ndk]);
	}
	public function postEditDK(Request $request, $madangky) {
		$ndk = NguoiDangKy::find($madangky);

		$this->validate($request,
			[
				'name' => 'required|min:3|max:32',
			],
			[
				'name.required' => 'Bạn chưa nhập tên người dùng',
				'name.min'      => 'Tên người dùng phải có ít nhất 3 ký tự',
				'name.max'      => 'Tên người dùng phải có tối đa 32 ký tự',
			]);
		$ndk->hoten = $request->name;

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
			$ndk->password = bcrypt($request->passwordnew);

		}

		$ndk->sdt   = $request->sdt;
		$ndk->email = $request->email;

		$ndk->diachi = $request->diachi;

		$ndk->save();
		return redirect()->route('ndk_quanly');
	}
}