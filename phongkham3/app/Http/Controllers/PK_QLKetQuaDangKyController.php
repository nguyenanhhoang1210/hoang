<?php

namespace App\Http\Controllers;

use App\BuongKham;

use App\NguoiDangKy;

use App\User;
use Auth;

use Illuminate\Http\Request;
use Mail;

class Pk_QLKetQuaDangKyController extends Controller {
	public function getKetQuaDangKy($madangky) {
		if ((Auth::guard('phongkham')->check())) {
			$id        = Auth::guard('phongkham')->user()->id;
			$buongkham = BuongKham::where('maphongkham', $id)->get();
			$ndk       = NguoiDangKy::find($madangky);
			return view('client.quanlyphongkham.ketquadangky.them', compact('ndk', 'buongkham'));
		}
	}
	public function postKetQuaDangKy(Request $request, $madangky) {

		$data = [
			'email'       => $request->mail,
			'subject'     => $request->subject,
			'bodyMessage' => $request->message,
		];
		Mail::send('client.quanlyphongkham.ketquadangky.mailfb', $data, function ($message) use ($data) {
				$message->from('huynhtam6767@gmail.com', 'Kết Quả Đăng Ký Khám Bệnh');
				$message->to($data['email']);
				$message->subject($data['subject']);
			});

		return redirect()->back();
	}

}
