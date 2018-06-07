<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class UserController extends Controller {
	public function getDanhSach() {
		// $user = User::where('quyen', 'like', 0)->take(10)->paginate(5);
		$user = User::all();
		return view('sever.admin.user.danhsach', ['user' => $user]);
	}

	public function getThem() {
		return view('sever.admin.user.them');
	}
	public function postThem(Request $request) {
		$this->validate($request,
			[
				'name'          => 'required|min:3',
				'email'         => 'required|email|unique:users,email',
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
		$user           = new User;
		$user->name     = $request->name;
		$user->email    = $request->email;
		$user->password = bcrypt($request->password);
		$user->quyen    = $request->quyen;
		$user->save();

		return redirect('sever/admin/user/them')->with('thongbao', 'Bạn đã thêm user thành công');

	}

	public function getSua($id) {
		$user = User::find($id);
		return view('sever.admin.user.sua', ['user' => $user]);
	}
	public function getSua2($id) {
		$user = User::find($id);
		return view('sever.nhanvien.sua', ['user' => $user]);
	}
	public function postSua(Request $request, $id) {
		$user = User::find($id);
		$this->validate($request,
			[
				'name' => 'required|min:3|max:32',
			],
			[
				'name.required' => 'Bạn chưa nhập tên người dùng',
				'name.min'      => 'Tên người dùng phải có ít nhất 3 ký tự',
				'name.max'      => 'Tên người dùng phải có tối đa 32 ký tự',
			]);
		$user->name = $request->name;

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
			$user->name     = $request->name;
			$user->password = bcrypt($request->passwordnew);

		}
		$user->quyen = $request->quyen;
		$user->save();

		return redirect('sever/admin/user/sua/'.$id)->with('thongbao', 'Bạn đã sửa thông tin user thành công');
	}
	public function postSua2(Request $request, $id) {
		$user = User::find($id);
		$this->validate($request,
			[
				'name' => 'required|min:3|max:32',
			],
			[
				'name.required' => 'Bạn chưa nhập tên người dùng',
				'name.min'      => 'Tên người dùng phải có ít nhất 3 ký tự',
				'name.max'      => 'Tên người dùng phải có tối đa 32 ký tự',
			]);
		$user->name = $request->name;

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
			$user->name     = $request->name;
			$user->password = bcrypt($request->passwordnew);

		}
		// $user->quyen = "0";
		$user->save();

		return redirect('sever/nhanvien/sua/'.$id)->with('thongbao', 'Bạn đã sửa thông tin user thành công');
	}

	public function getXoa($id) {
		$user = User::find($id);
		$user->delete();

		return redirect('sever/admin/user/danhsach')->with('thongbao', 'Bạn đã xoá user thành công');
	}
	public function getDangNhap() {
		return view('sever.login');
	}
	public function getQuenMatKhau() {
		return view('sever.reminder');
	}
	public function getTrangChu() {
		return view('sever.nhanvien.trangchu');
	}
	public function getTrangChu1() {
		return view('sever.admin.trangchu');
	}

	public function postDangNhap(Request $request) {
		$this->validate($request,
			[
				'email'    => 'required|email',
				'password' => 'required|min:3|max:32'
			], [
				'email.required'    => 'Bạn chưa nhập Email',
				'email.email'       => 'Email chưa đúng định dạng',
				'password.required' => 'Bạn chưa nhập password',
				'password.min'      => 'Password có tối thiểu 3 ký tự',
				'password.max'      => 'Password có tối đa 32 ký tự'
			]);
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			if (Auth::check()) {
				$user = Auth::user();
				if ($user->quyen == 1) {
					return redirect('sever/admin/trangchu');
				}
				if ($user->quyen == 0) {
					return redirect('sever/nhanvien/trangchu');
				}
			}

		} else {
			return redirect('sever/dangnhap')->with('thongbao', 'Đăng nhập không thành công');
		}
	}
	public function postQuenMatKhau(Request $request) {
		$this->validate($request,
			[
				'email' => 'required|email'
			], [
				'email.required' => 'Bạn chưa nhập Email',
				'email.email'    => 'Email chưa đúng định dạng',
			]);
		$email    = $request->email;
		$subject  = "Kết Quả Đổi Mật Khẩu";
		$password = strtoupper(str_random(8));
		$user     = User::where('email', $email)->get();
		if (count($user) == 0) {
			return redirect('sever/quenmatkhau')->with('thongbaoloi', 'Email của bạn không tồn tại trong hệ thống.');
		}
		foreach ($user as $us) {
			$us->password = bcrypt($password);
			$us->save();
		}

		$data = [
			'email'       => $email,
			'subject'     => $subject,
			'bodyMessage' => $password,
		];
		Mail::send('sever.mail', $data, function ($message) use ($data) {
				$message->from('huynhtam6767@gmail.com', 'Bot Mật Khẩu');
				$message->to($data['email']);
				$message->subject($data['subject']);
			});

		return redirect('sever/quenmatkhau')->with('thongbao', 'Mật khẩu đã được gửi email của bạn.');
	}
	public function getDangXuat() {
		Auth::logout();
		return redirect('sever/dangnhap');
	}
}
