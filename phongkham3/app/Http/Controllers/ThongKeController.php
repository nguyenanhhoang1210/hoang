<?php

namespace App\Http\Controllers;

use App\GiaHanHopDong;
use App\HopDong;
use App\NguoiDangKy;
use App\PhongKham;

class ThongKeController extends Controller {
	public function getThongKeAll1() {
		$phongkham = PhongKham::all();
		$hopdong   = HopDong::all();
		$giahan    = GiaHanHopDong::all();
		$nguoidk   = NguoiDangKy::all();
		$dempk     = count($phongkham);
		$demhd     = count($hopdong);
		$demgh     = count($giahan);
		$demndk    = count($nguoidk);
		$tienhd    = HopDong::all()->sum('giatri');
		$tiengh    = GiaHanHopDong::all()->sum('giatri');
		$tien      = $tienhd+$tiengh;
		return view('sever.admin.thongke.all', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien]);
	}
	public function getThongKeToDay1() {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today     = date("Y-m-d");
		$phongkham = PhongKham::where('created_at', $today)->get();
		$hopdong   = HopDong::where('ngayBD', $today)->get();
		$giahan    = GiaHanHopDong::where('ngayBD', $today)->get();
		$nguoidk   = NguoiDangKy::where('created_at', $today)->get();
		$dempk     = count($phongkham);
		$demhd     = count($hopdong);
		$demgh     = count($giahan);
		$demndk    = count($nguoidk);
		$tienhd    = HopDong::where('ngayBD', $today)->sum('giatri');
		$tiengh    = GiaHanHopDong::where('ngayBD', $today)->sum('giatri');
		$tien      = $tienhd+$tiengh;
		$tgh       = HopDong::where('trangthai', "Trễ Gia Hạn")->get();
		$ghhl      = HopDong::where('trangthai', "Gần Hết Hiệu Lực")->get();
		$hhl       = HopDong::where('trangthai', "Hết Hiệu Lực")->get();
		$demtgh    = count($tgh);
		$demghhl   = count($ghhl);
		$demhhl    = count($hhl);
		return view('sever.admin.thongke.today', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien, 'demtgh' => $demtgh, 'demghhl' => $demghhl, 'demhhl' => $demhhl]);
	}
	public function getThongKeThisWeek1() {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today     = date("Y-m-d");
		$daybefore = date('Y-m-d', strtotime('-6 day', strtotime($today)));

		$phongkham = PhongKham::all();
		$hopdong   = HopDong::all();
		$giahan    = GiaHanHopDong::all();
		$nguoidk   = NguoiDangKy::all();
		$dempk     = 0;
		$demhd     = 0;
		$demgh     = 0;
		$demndk    = 0;
		$tien      = 0;
		foreach ($phongkham as $pk) {
			if (strtotime($pk->created_at) > strtotime($daybefore)) {
				$dempk++;
			}
		}
		foreach ($nguoidk as $ndk) {
			if (strtotime($ndk->created_at) >= strtotime($daybefore) && strtotime($ndk->create_at) <= strtotime($today)) {
				$demndk++;
			}
		}
		foreach ($hopdong as $hd) {
			if (strtotime($hd->ngayBD) >= strtotime($daybefore) && strtotime($hd->ngayBD) <= strtotime($today)) {
				$demhd++;
				$tien = $tien+$hd->giatri;
			}
		}
		foreach ($giahan as $gh) {
			if (strtotime($gh->ngayBD) >= strtotime($daybefore) && strtotime($gh->ngayBD) <= strtotime($today)) {
				$demgh++;
				$tien = $tien+$gh->giatri;
			}
		}
		return view('sever.admin.thongke.thisweek', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien]);
	}
	public function getThongKeThisMonth1() {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today     = date("Y-m-d");
		$daybefore = date('Y-m-d', strtotime('-30 day', strtotime($today)));

		$phongkham = PhongKham::all();
		$hopdong   = HopDong::all();
		$giahan    = GiaHanHopDong::all();
		$nguoidk   = NguoiDangKy::all();
		$dempk     = 0;
		$demhd     = 0;
		$demgh     = 0;
		$demndk    = 0;
		$tien      = 0;
		foreach ($phongkham as $pk) {
			if (strtotime($pk->created_at) > strtotime($daybefore)) {
				$dempk++;
			}
		}
		foreach ($nguoidk as $ndk) {
			if (strtotime($ndk->created_at) >= strtotime($daybefore) && strtotime($ndk->create_at) <= strtotime($today)) {
				$demndk++;
			}
		}
		foreach ($hopdong as $hd) {
			if (strtotime($hd->ngayBD) >= strtotime($daybefore) && strtotime($hd->ngayBD) <= strtotime($today)) {
				$demhd++;
				$tien = $tien+$hd->giatri;
			}
		}
		foreach ($giahan as $gh) {
			if (strtotime($gh->ngayBD) >= strtotime($daybefore) && strtotime($gh->ngayBD) <= strtotime($today)) {
				$demgh++;
				$tien = $tien+$gh->giatri;
			}
		}
		return view('sever.admin.thongke.thismonth', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien]);
	}
	public function getThongKeThisYear1() {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today     = date("Y-m-d");
		$daybefore = date('Y-m-d', strtotime('-365 day', strtotime($today)));

		$phongkham = PhongKham::all();
		$hopdong   = HopDong::all();
		$giahan    = GiaHanHopDong::all();
		$nguoidk   = NguoiDangKy::all();
		$dempk     = 0;
		$demhd     = 0;
		$demgh     = 0;
		$demndk    = 0;
		$tien      = 0;
		foreach ($phongkham as $pk) {
			if (strtotime($pk->created_at) > strtotime($daybefore)) {
				$dempk++;
			}
		}
		foreach ($nguoidk as $ndk) {
			if (strtotime($ndk->created_at) >= strtotime($daybefore) && strtotime($ndk->create_at) <= strtotime($today)) {
				$demndk++;
			}
		}
		foreach ($hopdong as $hd) {
			if (strtotime($hd->ngayBD) >= strtotime($daybefore) && strtotime($hd->ngayBD) <= strtotime($today)) {
				$demhd++;
				$tien = $tien+$hd->giatri;
			}
		}
		foreach ($giahan as $gh) {
			if (strtotime($gh->ngayBD) >= strtotime($daybefore) && strtotime($gh->ngayBD) <= strtotime($today)) {
				$demgh++;
				$tien = $tien+$gh->giatri;
			}
		}
		return view('sever.admin.thongke.thisyear', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien]);
	}
	public function getThongKeAll() {
		$phongkham = PhongKham::all();
		$hopdong   = HopDong::all();
		$giahan    = GiaHanHopDong::all();
		$nguoidk   = NguoiDangKy::all();
		$dempk     = count($phongkham);
		$demhd     = count($hopdong);
		$demgh     = count($giahan);
		$demndk    = count($nguoidk);
		$tienhd    = HopDong::all()->sum('giatri');
		$tiengh    = GiaHanHopDong::all()->sum('giatri');
		$tien      = $tienhd+$tiengh;
		return view('sever.nhanvien.thongke.all', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien]);
	}
	public function getThongKeToDay() {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today     = date("Y-m-d");
		$phongkham = PhongKham::where('created_at', $today)->get();
		$hopdong   = HopDong::where('ngayBD', $today)->get();
		$giahan    = GiaHanHopDong::where('ngayBD', $today)->get();
		$nguoidk   = NguoiDangKy::where('created_at', $today)->get();
		$dempk     = count($phongkham);
		$demhd     = count($hopdong);
		$demgh     = count($giahan);
		$demndk    = count($nguoidk);
		$tienhd    = HopDong::where('ngayBD', $today)->sum('giatri');
		$tiengh    = GiaHanHopDong::where('ngayBD', $today)->sum('giatri');
		$tien      = $tienhd+$tiengh;
		$tgh       = HopDong::where('trangthai', "Trễ Gia Hạn")->get();
		$ghhl      = HopDong::where('trangthai', "Gần Hết Hiệu Lực")->get();
		$hhl       = HopDong::where('trangthai', "Hết Hiệu Lực")->get();
		$demtgh    = count($tgh);
		$demghhl   = count($ghhl);
		$demhhl    = count($hhl);
		return view('sever.nhanvien.thongke.today', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien, 'demtgh' => $demtgh, 'demghhl' => $demghhl, 'demhhl' => $demhhl]);
	}
	public function getThongKeThisWeek() {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today     = date("Y-m-d");
		$daybefore = date('Y-m-d', strtotime('-6 day', strtotime($today)));

		$phongkham = PhongKham::all();
		$hopdong   = HopDong::all();
		$giahan    = GiaHanHopDong::all();
		$nguoidk   = NguoiDangKy::all();
		$dempk     = 0;
		$demhd     = 0;
		$demgh     = 0;
		$demndk    = 0;
		$tien      = 0;
		foreach ($phongkham as $pk) {
			if (strtotime($pk->created_at) > strtotime($daybefore)) {
				$dempk++;
			}
		}
		foreach ($nguoidk as $ndk) {
			if (strtotime($ndk->created_at) >= strtotime($daybefore) && strtotime($ndk->create_at) <= strtotime($today)) {
				$demndk++;
			}
		}
		foreach ($hopdong as $hd) {
			if (strtotime($hd->ngayBD) >= strtotime($daybefore) && strtotime($hd->ngayBD) <= strtotime($today)) {
				$demhd++;
				$tien = $tien+$hd->giatri;
			}
		}
		foreach ($giahan as $gh) {
			if (strtotime($gh->ngayBD) >= strtotime($daybefore) && strtotime($gh->ngayBD) <= strtotime($today)) {
				$demgh++;
				$tien = $tien+$gh->giatri;
			}
		}
		return view('sever.nhanvien.thongke.thisweek', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien]);
	}
	public function getThongKeThisMonth() {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today     = date("Y-m-d");
		$daybefore = date('Y-m-d', strtotime('-30 day', strtotime($today)));

		$phongkham = PhongKham::all();
		$hopdong   = HopDong::all();
		$giahan    = GiaHanHopDong::all();
		$nguoidk   = NguoiDangKy::all();
		$dempk     = 0;
		$demhd     = 0;
		$demgh     = 0;
		$demndk    = 0;
		$tien      = 0;
		foreach ($phongkham as $pk) {
			if (strtotime($pk->created_at) > strtotime($daybefore)) {
				$dempk++;
			}
		}
		foreach ($nguoidk as $ndk) {
			if (strtotime($ndk->created_at) >= strtotime($daybefore) && strtotime($ndk->create_at) <= strtotime($today)) {
				$demndk++;
			}
		}
		foreach ($hopdong as $hd) {
			if (strtotime($hd->ngayBD) >= strtotime($daybefore) && strtotime($hd->ngayBD) <= strtotime($today)) {
				$demhd++;
				$tien = $tien+$hd->giatri;
			}
		}
		foreach ($giahan as $gh) {
			if (strtotime($gh->ngayBD) >= strtotime($daybefore) && strtotime($gh->ngayBD) <= strtotime($today)) {
				$demgh++;
				$tien = $tien+$gh->giatri;
			}
		}
		return view('sever.nhanvien.thongke.thismonth', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien]);
	}
	public function getThongKeThisYear() {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$today     = date("Y-m-d");
		$daybefore = date('Y-m-d', strtotime('-365 day', strtotime($today)));

		$phongkham = PhongKham::all();
		$hopdong   = HopDong::all();
		$giahan    = GiaHanHopDong::all();
		$nguoidk   = NguoiDangKy::all();
		$dempk     = 0;
		$demhd     = 0;
		$demgh     = 0;
		$demndk    = 0;
		$tien      = 0;
		foreach ($phongkham as $pk) {
			if (strtotime($pk->created_at) > strtotime($daybefore)) {
				$dempk++;
			}
		}
		foreach ($nguoidk as $ndk) {
			if (strtotime($ndk->created_at) >= strtotime($daybefore) && strtotime($ndk->create_at) <= strtotime($today)) {
				$demndk++;
			}
		}
		foreach ($hopdong as $hd) {
			if (strtotime($hd->ngayBD) >= strtotime($daybefore) && strtotime($hd->ngayBD) <= strtotime($today)) {
				$demhd++;
				$tien = $tien+$hd->giatri;
			}
		}
		foreach ($giahan as $gh) {
			if (strtotime($gh->ngayBD) >= strtotime($daybefore) && strtotime($gh->ngayBD) <= strtotime($today)) {
				$demgh++;
				$tien = $tien+$gh->giatri;
			}
		}
		return view('sever.nhanvien.thongke.thisyear', ['dempk' => $dempk, 'demhd' => $demhd, 'demgh' => $demgh, 'demndk' => $demndk, 'tien' => $tien]);
	}
}
