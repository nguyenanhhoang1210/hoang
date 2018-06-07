<?php

namespace App\Http\Controllers;

use App\GiaHanHopDong;
use App\HopDong;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	function __construct() {
		$giahanhopdong = GiaHanHopDong::all();
		foreach ($giahanhopdong as $gh) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$today   = date("Y-m-d");
			$hieu_so = abs(strtotime($gh->ngayKT)-strtotime($today));
			$nam     = floor($hieu_so/(365*60*60*24));
			$thang   = floor(($hieu_so-$nam*365*60*60*24)/(30*60*60*24));
			$ngay    = floor(($hieu_so-$nam*365*60*60*24-$thang*30*60*60*24)/(60*60*24));
			if (strtotime($gh->ngayKT) < strtotime($today)) {
				if ($nam == 0) {
					if ($thang == 0) {
						if ($ngay < 7) {
							$gh->trangthai = "Trễ Gia Hạn";
							$gh->save();
						}
						if ($ngay >= 7) {
							$gh->trangthai = "Hết Hiệu Lực";
							$gh->save();
						}
					} else {
						$gh->trangthai = "Chấm Dứt";
						$gh->save();
					}
				} else {
					$gh->trangthai = "Chấm Dứt";
					$gh->save();
				}

			}
			if (strtotime($today) < strtotime($gh->ngayBD)) {
				$gh->trangthai = "Chưa Hiệu Lực";
				$gh->save();
			}
			if (strtotime($gh->ngayKT) == strtotime($today)) {
				$gh->trangthai = "Hiệu Lực";
				$gh->save();
			}
			if (strtotime($gh->ngayKT) > strtotime($today)) {
				if ($nam == 0) {
					if ($thang == 0) {
						if ($ngay < 7) {
							$gh->trangthai = "Gần Hết Hiệu Lực";
							$gh->save();
						}
					} else {
						$gh->trangthai = "Hiệu Lực";
						$gh->save();
					}
				} else {
					$gh->trangthai = "Hiệu Lực";
					$gh->save();
				}

			}

		}

		$hopdong = HopDong::all();
		foreach ($hopdong as $hd) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$today   = date("Y-m-d");
			$hieu_so = abs(strtotime($hd->ngayKT)-strtotime($today));
			$nam     = floor($hieu_so/(365*60*60*24));
			$thang   = floor(($hieu_so-$nam*365*60*60*24)/(30*60*60*24));
			$ngay    = floor(($hieu_so-$nam*365*60*60*24-$thang*30*60*60*24)/(60*60*24));
			if (strtotime($hd->ngayKT) < strtotime($today)) {
				if ($nam == 0) {
					if ($thang == 0) {
						if ($ngay < 7) {
							$hd->trangthai = "Trễ Gia Hạn";
							$hd->save();
						}
						if ($ngay >= 7) {
							$hd->trangthai = "Hết Hiệu Lực";
							$hd->save();
						}
					} else {
						$hd->trangthai = "Chấm Dứt";
						$hd->save();
					}
				} else {
					$hd->trangthai = "Chấm Dứt";
					$hd->save();
				}

			}
			if (strtotime($today) < strtotime($hd->ngayBD)) {
				$hd->trangthai = "Chưa Hiệu Lực";
				$hd->save();
			}
			if (strtotime($hd->ngayKT) == strtotime($today)) {
				$hd->trangthai = "Hiệu Lực";
				$hd->save();
			}
			if (strtotime($hd->ngayKT) > strtotime($today)) {
				if ($nam == 0) {
					if ($thang == 0) {
						if ($ngay < 7) {
							$hd->trangthai = "Gần Hết Hiệu Lực";
							$hd->save();
						}
					} else {
						$hd->trangthai = "Hiệu Lực";
						$hd->save();
					}
				} else {
					$hd->trangthai = "Hiệu Lực";
					$hd->save();
				}

			}

		}

		$giahanhopdong = GiaHanHopDong::all();
		foreach ($giahanhopdong as $gh) {
			if ($gh->trangthai == "Hiệu Lực") {
				$gh->hopdong->trangthai = "Hiệu Lực";
				$gh->hopdong->save();
			} elseif ($gh->trangthai == "Gần Hết Hiệu Lực") {
				$gh->hopdong->trangthai = "Gần Hết Hiệu Lực";
				$gh->hopdong->save();
			} elseif ($gh->trangthai == "Hết Hiệu Lực") {
				$gh->hopdong->trangthai = "Hết Hiệu Lực";
				$gh->hopdong->save();
			} elseif ($gh->trangthai == "Chấm Dứt") {
				$gh->hopdong->trangthai = "Chấm Dứt";
				$gh->hopdong->save();
			} elseif ($gh->trangthai == "Trễ Gia Hạn") {
				$gh->hopdong->trangthai = "Trễ Gia Hạn";
				$gh->hopdong->save();
			}

		}

		$hopdong = HopDong::all();
		foreach ($hopdong as $hd) {
			if ($hd->trangthai == "Chưa Hiệu Lực") {
				$hd->phongkham->TrangThai = "off";
			} elseif ($hd->trangthai == "Hiệu Lực") {
				$hd->phongkham->TrangThai = "on";
			} elseif ($hd->trangthai == "Gần Hết Hiệu Lực") {
				$hd->phongkham->TrangThai = "on";
			} elseif ($hd->trangthai == "Hết Hiệu Lực") {
				$hd->phongkham->TrangThai = "off";
			} elseif ($hd->trangthai == "Chấm Dứt") {
				$hd->phongkham->TrangThai = "off";
			} elseif ($hd->trangthai == "Trễ Gia Hạn") {
				$hd->phongkham->TrangThai = "on";
			}
			$hd->phongkham->save();
		}

		$hopdongthongbao = HopDong::where('trangthai', "Gần Hết Hiệu Lực")->orwhere('trangthai', "Trễ Gia Hạn")->orwhere('trangthai', "Hết Hiệu Lực")->orderby('ngayKT', 'DESC')->get();
		$giahanthongbao  = GiaHanHopDong::where('trangthai', "Gần Hết Hiệu Lực")->orwhere('trangthai', "Trễ Gia Hạn")->orwhere('trangthai', "Hết Hiệu Lực")->orderby('ngayKT', 'DESC')->get();
		$demthongbao     = count($hopdongthongbao);
		view()->share('hopdongthongbao', $hopdongthongbao);
		view()->share('giahanthongbao', $giahanthongbao);
		view()->share('demthongbao', $demthongbao);
		view()->share('today', $today);

	}

}
