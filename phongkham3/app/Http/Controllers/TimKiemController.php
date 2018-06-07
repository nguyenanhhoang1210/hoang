<?php

namespace App\Http\Controllers;

use App\ChuyenKhoa;

use App\DichVu;
use App\GiaHanHopDong;
use App\HopDong;
use App\LoaiDichVu;
use App\NguoiDangKy;
use App\PhongKham;
use App\TinTuc;

use Illuminate\Http\Request;

class TimKiemController extends Controller {
	public function postTimKiem(Request $request) {
		$tukhoa = $request->TuKhoa;
		if ($request->TimKiem == "phongkham") {
			$phongkham = PhongKham::where('tenphongkham', 'like', "%$tukhoa%")->orwhere('email', 'like', "%$tukhoa%")->orwhere('id', 'like', "%$tukhoa%")->orwhere('TrangThai', 'like', "%$tukhoa%")->get();
			$dem       = count($phongkham);
			return view('sever.nhanvien.phongkham.timkiem', ['phongkham' => $phongkham, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		} elseif ($request->TimKiem == "nguoidangky") {
			$nguoidangky = NguoiDangKy::where('hoten', 'like', "%$tukhoa%")->orwhere('email', 'like', "%$tukhoa%")->orwhere('madangky', 'like', "%$tukhoa%")->get();
			$dem         = count($nguoidangky);
			return view('sever.nhanvien.nguoidangky.timkiem', ['nguoidangky' => $nguoidangky, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		} elseif ($request->TimKiem == "tintuc") {
			$tintuc = TinTuc::where('TieuDe', 'like', "%$tukhoa%")->orwhere('TomTat', 'like', "%$tukhoa%")->orwhere('NoiDung', 'like', "%$tukhoa%")->get();
			$dem    = count($tintuc);
			return view('sever.nhanvien.tintuc.timkiem', ['tintuc' => $tintuc, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		} elseif ($request->TimKiem == "chuyenkhoa") {
			$chuyenkhoa = ChuyenKhoa::where('Ten', 'like', "%$tukhoa%")->orwhere('id', 'like', "%$tukhoa%")->get();
			$dem        = count($chuyenkhoa);
			return view('sever.nhanvien.chuyenkhoa.timkiem', ['chuyenkhoa' => $chuyenkhoa, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		} elseif ($request->TimKiem == "loaidichvu") {
			$loaidichvu = LoaiDichVu::where('Ten', 'like', "%$tukhoa%")->orwhere('id', 'like', "%$tukhoa%")->get();
			$dem        = count($loaidichvu);
			return view('sever.nhanvien.loaidichvu.timkiem', ['loaidichvu' => $loaidichvu, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		} elseif ($request->TimKiem == "dichvu") {
			$dichvu = DichVu::Join('LoaiDichVu', 'DichVu.idLoai', '=', 'LoaiDichVu.id')->select('DichVu.*')->where('DichVu.Ten', 'like', "%$tukhoa%")->orwhere('DichVu.id', 'like', "%$tukhoa%")->orwhere('LoaiDichVu.Ten', 'like', "%$tukhoa%")->get();
			$dem    = count($dichvu);
			return view('sever.nhanvien.dichvu.timkiem', ['dichvu' => $dichvu, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		} elseif ($request->TimKiem == "hopdong") {
			$hopdong = HopDong::Join('PhongKham', 'HopDong.idPhongKham', '=', 'PhongKham.id')->select('HopDong.*')->where('HopDong.maHD', 'like', "%$tukhoa%")->orwhere('HopDong.idPhongKham', 'like', "%$tukhoa%")->orwhere('PhongKham.tenphongkham', 'like', "%$tukhoa%")->orwhere('HopDong.giatri', 'like', "%$tukhoa%")->orwhere('HopDong.ngayBD', 'like', "%$tukhoa%")->orwhere('HopDong.ngayKT', 'like', "%$tukhoa%")->orwhere('HopDong.trangthai', 'like', "%$tukhoa%")->get();
			$dem     = count($hopdong);
			return view('sever.nhanvien.hopdong.timkiem', ['hopdong' => $hopdong, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		} elseif ($request->TimKiem == "giahan") {
			$giahan = GiaHanHopDong::Join('HopDong', 'GiaHanHopDong.maHD', '=', 'HopDong.maHD')->join('PhongKham', 'HopDong.idPhongKham', '=', 'PhongKham.id')->select('GiaHanHopDong.*')->where('GiaHanHopDong.maGH', 'like', "%$tukhoa%")->orwhere('GiaHanHopDong.maHD', 'like', "%$tukhoa%")->orwhere('GiaHanHopDong.giatri', 'like', "%$tukhoa%")->orwhere('GiaHanHopDong.ngayBD', 'like', "%$tukhoa%")->orwhere('GiaHanHopDong.ngayKT', 'like', "%$tukhoa%")->orwhere('PhongKham.tenphongkham', 'like', "%$tukhoa%")->orwhere('GiaHanHopDong.trangthai', 'like', "%$tukhoa%")->get();
			$dem    = count($giahan);
			return view('sever.nhanvien.giahanhopdong.timkiem', ['giahan' => $giahan, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		}

	}
}
