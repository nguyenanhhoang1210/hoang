<?php

namespace App\Http\Controllers;

use App\GiaHanHopDong;
use App\HopDong;
use App\PhongKham;
use Illuminate\Http\Request;
use Mail;

class HopDongController extends Controller {
	public function getDanhSach1() {
		$hopdong = HopDong::all();
		return view('sever.admin.hopdong.danhsach', ['hopdong' => $hopdong]);
	}
	public function getThem1($id) {
		$phongkham = PhongKham::find($id);
		return view('sever.admin.hopdong.them', ['phongkham' => $phongkham]);
	}

	public function postThem1(Request $request, $id) {
		$this->validate($request,

			[
				'maHD'   => 'min:1|max:50|unique:HopDong,maHD',
				'giatri' => 'regex:/^[0-9]+$/u',
			],

			[
				'maHD.min'     => 'Mã hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maHD.max'     => 'Mã hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maHD.unique'  => 'Mã hợp đồng đã tồn tại ',
				'giatri.regex' => 'Giá trị chỉ được nhập số'
			]);
		$hopdong              = new HopDong;
		$hopdong->maHD        = $request->maHD;
		$hopdong->idPhongKham = $id;
		$hopdong->giatri      = $request->giatri;
		$hopdong->ngayBD      = $request->ngayBD;
		$hopdong->ngayKT      = $request->ngayKT;
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today = date("Y-m-d");
		if (strtotime($today) < strtotime($request->ngayBD)) {
			$hopdong->trangthai = "Chưa Hiệu Lực";
		}
		if (strtotime($today) == strtotime($request->ngayBD) || strtotime($today) == strtotime($request->ngayKT)) {
			$hopdong->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayBD) && strtotime($today) < strtotime($request->ngayKT)) {
			$hopdong->trangthai = "Hiệu Lực";
		}
		// if (strtotime($today) > strtotime($request->ngayKT)) {
		// 	$hopdong->trangthai = "Hết Hiệu Lực";
		// }
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today   = date("Y-m-d");
		$hieu_so = abs(strtotime($hopdong->ngayKT)-strtotime($today));
		$nam     = floor($hieu_so/(365*60*60*24));
		$thang   = floor(($hieu_so-$nam*365*60*60*24)/(30*60*60*24));
		$ngay    = floor(($hieu_so-$nam*365*60*60*24-$thang*30*60*60*24)/(60*60*24));
		if (strtotime($today) > strtotime($request->ngayKT)) {
			if ($nam == 0) {
				if ($thang == 0) {
					if ($ngay < 7) {
						$hopdong->trangthai = "Trễ Gia Hạn";

					}
					if ($ngay >= 7) {
						$hopdong->trangthai = "Hết Hiệu Lực";

					}
				} else {
					$hopdong->trangthai = "Chấm Dứt";

				}
			} else {
				$hopdong->trangthai = "Chấm Dứt";

			}

		}
		$hopdong->save();

		return redirect('sever/admin/hopdong/danhsach')->with('thongbao', 'Bạn đã thêm hợp đồng thành công');
	}
	public function getSua1($id) {
		$hopdong = HopDong::find($id);

		return view('sever.admin.hopdong.sua', ['hopdong' => $hopdong]);
	}
	public function postSua1(Request $request, $id) {
		$hopdong = HopDong::find($id);
		$this->validate($request,

			[
				'maHD'   => 'min:1|max:50|unique:HopDong,maHD',
				'giatri' => 'regex:/^[0-9]+$/u',
			],

			[
				'maHD.min'     => 'Mã hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maHD.max'     => 'Mã hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maHD.unique'  => 'Mã hợp đồng đã tồn tại ',
				'giatri.regex' => 'Giá trị chỉ được nhập số'
			]);
		$hopdong->giatri = $request->giatri;
		$hopdong->ngayBD = $request->ngayBD;
		$hopdong->ngayKT = $request->ngayKT;
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today = date("Y-m-d");
		if (strtotime($today) < strtotime($request->ngayBD)) {
			$hopdong->trangthai = "Chưa Hiệu Lực";
		}
		if (strtotime($today) == strtotime($request->ngayBD) || strtotime($today) == strtotime($request->ngayKT)) {
			$hopdong->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayBD) && strtotime($today) < strtotime($request->ngayKT)) {
			$hopdong->trangthai = "Hiệu Lực";
		}
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today   = date("Y-m-d");
		$hieu_so = abs(strtotime($hopdong->ngayKT)-strtotime($today));
		$nam     = floor($hieu_so/(365*60*60*24));
		$thang   = floor(($hieu_so-$nam*365*60*60*24)/(30*60*60*24));
		$ngay    = floor(($hieu_so-$nam*365*60*60*24-$thang*30*60*60*24)/(60*60*24));
		if (strtotime($today) > strtotime($request->ngayKT)) {
			if ($nam == 0) {
				if ($thang == 0) {
					if ($ngay < 7) {
						$hopdong->trangthai = "Trễ Gia Hạn";

					}
					if ($ngay >= 7) {
						$hopdong->trangthai = "Hết Hiệu Lực";

					}
				} else {
					$hopdong->trangthai = "Chấm Dứt";

				}
			} else {
				$hopdong->trangthai = "Chấm Dứt";

			}

		}
		$hopdong->save();

		return redirect('sever/admin/hopdong/danhsach')->with('thongbao', 'Bạn đã cập nhật hợp đồng thành công');
	}
	public function getXoa1($id) {
		$hopdong       = HopDong::find($id);
		$giahanhopdong = GiaHanHopDong::where('maHD', $hopdong->maHD)->get();
		$dem           = count($giahanhopdong);
		if ($dem == 0) {
			$hopdong->delete();
			return redirect('sever/admin/hopdong/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
		}
		if ($dem > 0) {
			return redirect('sever/admin/hopdong/danhsach')->with('thongbaoloi', 'Còn tồn tại ràng buộc với bảng gia hạn hợp đồng nên không thể xoá');
		}

	}
	public function getThongBao1($id) {
		$hopdong  = HopDong::find($id);
		$email    = $hopdong->phongkham->email;
		$subject  = "Thông Báo";
		$noidung1 = "Tài khoản của bạn đã gần hết hiệu lực và có giá trị đến ngày ".$hopdong->ngayKT.". Vui lòng bạn hãy gia hạn thêm để tiếp tục sử dụng dịch vụ của chúng tôi.";
		$noidung2 = "Tài khoản của bạn đã hết hạn sau ngày ".$hopdong->ngayKT." và sau thời điểm đó 7 ngày tài khoản của bạn sẽ bị khoá. Vui lòng bạn hãy gia hạn thêm để tiếp tục sử dụng dịch vụ của chúng tôi.";
		$noidung3 = "Rất đáng tiếc, tài khoản của bạn đã bị khoá. Cảm ơn quý khách đã sử dụng dịch vụ trong thời gian qua, nếu có sai sót gì mong quý khách gửi thư phản hồi và nếu muốn tiếp tục sử dụng dịch vụ vui lòng bạn hãy gia hạn thêm.";
		if ($hopdong->trangthai == "Gần Hết Hiệu Lực") {
			$data = [
				'email'       => $email,
				'subject'     => $subject,
				'bodyMessage' => $noidung1,
			];
			Mail::send('sever.admin.hopdong.mail', $data, function ($message) use ($data) {
					$message->from('huynhtam6767@gmail.com', 'CTY FindDoctor');
					$message->to($data['email']);
					$message->subject($data['subject']);
				});
		} elseif ($hopdong->trangthai == "Trễ Gia Hạn") {
			$data = [
				'email'       => $email,
				'subject'     => $subject,
				'bodyMessage' => $noidung2,
			];
			Mail::send('sever.admin.hopdong.mail', $data, function ($message) use ($data) {
					$message->from('huynhtam6767@gmail.com', 'CTY FindDoctor');
					$message->to($data['email']);
					$message->subject($data['subject']);
				});
		} elseif ($hopdong->trangthai == "Hết Hiệu Lực") {
			$data = [
				'email'       => $email,
				'subject'     => $subject,
				'bodyMessage' => $noidung3,
			];
			Mail::send('sever.admin.hopdong.mail', $data, function ($message) use ($data) {
					$message->from('huynhtam6767@gmail.com', 'CTY FindDoctor');
					$message->to($data['email']);
					$message->subject($data['subject']);
				});
		}
		return redirect('sever/admin/hopdong/danhsach')->with('thongbao', 'Bạn đã thông báo thành công');
	}
	public function getDanhSach() {
		$hopdong = HopDong::all();
		return view('sever.nhanvien.hopdong.danhsach', ['hopdong' => $hopdong]);
	}
	public function getThem($id) {
		$phongkham = PhongKham::find($id);
		return view('sever.nhanvien.hopdong.them', ['phongkham' => $phongkham]);
	}

	public function postThem(Request $request, $id) {
		$this->validate($request,

			[
				'maHD'   => 'min:1|max:50|unique:HopDong,maHD',
				'giatri' => 'regex:/^[0-9]+$/u',
			],

			[
				'maHD.min'     => 'Mã hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maHD.max'     => 'Mã hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maHD.unique'  => 'Mã hợp đồng đã tồn tại ',
				'giatri.regex' => 'Giá trị chỉ được nhập số'
			]);
		$hopdong              = new HopDong;
		$hopdong->maHD        = $request->maHD;
		$hopdong->idPhongKham = $id;
		$hopdong->giatri      = $request->giatri;
		$hopdong->ngayBD      = $request->ngayBD;
		$hopdong->ngayKT      = $request->ngayKT;
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today = date("Y-m-d");
		if (strtotime($today) < strtotime($request->ngayBD)) {
			$hopdong->trangthai = "Chưa Hiệu Lực";
		}
		if (strtotime($today) == strtotime($request->ngayBD) || strtotime($today) == strtotime($request->ngayKT)) {
			$hopdong->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayBD) && strtotime($today) < strtotime($request->ngayKT)) {
			$hopdong->trangthai = "Hiệu Lực";
		}
		// if (strtotime($today) > strtotime($request->ngayKT)) {
		// 	$hopdong->trangthai = "Hết Hiệu Lực";
		// }
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today   = date("Y-m-d");
		$hieu_so = abs(strtotime($hopdong->ngayKT)-strtotime($today));
		$nam     = floor($hieu_so/(365*60*60*24));
		$thang   = floor(($hieu_so-$nam*365*60*60*24)/(30*60*60*24));
		$ngay    = floor(($hieu_so-$nam*365*60*60*24-$thang*30*60*60*24)/(60*60*24));
		if (strtotime($today) > strtotime($request->ngayKT)) {
			if ($nam == 0) {
				if ($thang == 0) {
					if ($ngay < 7) {
						$hopdong->trangthai = "Trễ Gia Hạn";

					}
					if ($ngay >= 7) {
						$hopdong->trangthai = "Hết Hiệu Lực";

					}
				} else {
					$hopdong->trangthai = "Chấm Dứt";

				}
			} else {
				$hopdong->trangthai = "Chấm Dứt";

			}

		}
		$hopdong->save();

		return redirect('sever/nhanvien/hopdong/danhsach')->with('thongbao', 'Bạn đã thêm hợp đồng thành công');
	}
	public function getSua($id) {
		$hopdong = HopDong::find($id);

		return view('sever.nhanvien.hopdong.sua', ['hopdong' => $hopdong]);
	}
	public function postSua(Request $request, $id) {
		$hopdong = HopDong::find($id);
		$this->validate($request,

			[
				'maHD'   => 'min:1|max:50|unique:HopDong,maHD',
				'giatri' => 'regex:/^[0-9]+$/u',
			],

			[
				'maHD.min'     => 'Mã hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maHD.max'     => 'Mã hợp đồng có độ dài từ 3 dến 50 ký tự',
				'maHD.unique'  => 'Mã hợp đồng đã tồn tại ',
				'giatri.regex' => 'Giá trị chỉ được nhập số'
			]);
		$hopdong->giatri = $request->giatri;
		$hopdong->ngayBD = $request->ngayBD;
		$hopdong->ngayKT = $request->ngayKT;
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today = date("Y-m-d");
		if (strtotime($today) < strtotime($request->ngayBD)) {
			$hopdong->trangthai = "Chưa Hiệu Lực";
		}
		if (strtotime($today) == strtotime($request->ngayBD) || strtotime($today) == strtotime($request->ngayKT)) {
			$hopdong->trangthai = "Hiệu Lực";
		}
		if (strtotime($today) > strtotime($request->ngayBD) && strtotime($today) < strtotime($request->ngayKT)) {
			$hopdong->trangthai = "Hiệu Lực";
		}
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today   = date("Y-m-d");
		$hieu_so = abs(strtotime($hopdong->ngayKT)-strtotime($today));
		$nam     = floor($hieu_so/(365*60*60*24));
		$thang   = floor(($hieu_so-$nam*365*60*60*24)/(30*60*60*24));
		$ngay    = floor(($hieu_so-$nam*365*60*60*24-$thang*30*60*60*24)/(60*60*24));
		if (strtotime($today) > strtotime($request->ngayKT)) {
			if ($nam == 0) {
				if ($thang == 0) {
					if ($ngay < 7) {
						$hopdong->trangthai = "Trễ Gia Hạn";

					}
					if ($ngay >= 7) {
						$hopdong->trangthai = "Hết Hiệu Lực";

					}
				} else {
					$hopdong->trangthai = "Chấm Dứt";

				}
			} else {
				$hopdong->trangthai = "Chấm Dứt";

			}

		}
		$hopdong->save();

		return redirect('sever/nhanvien/hopdong/danhsach')->with('thongbao', 'Bạn đã cập nhật hợp đồng thành công');
	}
	public function getXoa($id) {
		$hopdong       = HopDong::find($id);
		$giahanhopdong = GiaHanHopDong::where('maHD', $hopdong->maHD)->get();
		$dem           = count($giahanhopdong);
		if ($dem == 0) {
			$hopdong->delete();
			return redirect('sever/nhanvien/hopdong/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
		}
		if ($dem > 0) {
			return redirect('sever/nhanvien/hopdong/danhsach')->with('thongbaoloi', 'Còn tồn tại ràng buộc với bảng gia hạn hợp đồng nên không thể xoá');
		}

	}
	public function getThongBao($id) {
		$hopdong  = HopDong::find($id);
		$email    = $hopdong->phongkham->email;
		$subject  = "Thông Báo";
		$noidung1 = "Tài khoản của bạn đã gần hết hiệu lực và có giá trị đến ngày ".$hopdong->ngayKT.". Vui lòng bạn hãy gia hạn thêm để tiếp tục sử dụng dịch vụ của chúng tôi.";
		$noidung2 = "Tài khoản của bạn đã hết hạn sau ngày ".$hopdong->ngayKT." và sau thời điểm đó 7 ngày tài khoản của bạn sẽ bị khoá. Vui lòng bạn hãy gia hạn thêm để tiếp tục sử dụng dịch vụ của chúng tôi.";
		$noidung3 = "Rất đáng tiếc, tài khoản của bạn đã bị khoá. Cảm ơn quý khách đã sử dụng dịch vụ trong thời gian qua, nếu có sai sót gì mong quý khách gửi thư phản hồi và nếu muốn tiếp tục sử dụng dịch vụ vui lòng bạn hãy gia hạn thêm.";
		if ($hopdong->trangthai == "Gần Hết Hiệu Lực") {
			$data = [
				'email'       => $email,
				'subject'     => $subject,
				'bodyMessage' => $noidung1,
			];
			Mail::send('sever.nhanvien.hopdong.mail', $data, function ($message) use ($data) {
					$message->from('huynhtam6767@gmail.com', 'CTY FindDoctor');
					$message->to($data['email']);
					$message->subject($data['subject']);
				});
		} elseif ($hopdong->trangthai == "Trễ Gia Hạn") {
			$data = [
				'email'       => $email,
				'subject'     => $subject,
				'bodyMessage' => $noidung2,
			];
			Mail::send('sever.nhanvien.hopdong.mail', $data, function ($message) use ($data) {
					$message->from('huynhtam6767@gmail.com', 'CTY FindDoctor');
					$message->to($data['email']);
					$message->subject($data['subject']);
				});
		} elseif ($hopdong->trangthai == "Hết Hiệu Lực") {
			$data = [
				'email'       => $email,
				'subject'     => $subject,
				'bodyMessage' => $noidung3,
			];
			Mail::send('sever.nhanvien.hopdong.mail', $data, function ($message) use ($data) {
					$message->from('huynhtam6767@gmail.com', 'CTY FindDoctor');
					$message->to($data['email']);
					$message->subject($data['subject']);
				});
		}
		return redirect('sever/nhanvien/hopdong/danhsach')->with('thongbao', 'Bạn đã thông báo thành công');
	}
}
