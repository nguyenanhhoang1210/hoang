<?php

namespace App\Http\Controllers;
use App\DanhMucThuoc;
use App\PhongKham;
use App\PhuongXa;
use App\QuanHuyen;

class AjaxController extends Controller {
	public function getDanhMucThuoc($idDanhMuc) {
		$danhmucthuoc = DanhMucThuoc::where('idDanhMuc', $idDanhMuc)->orderby('name', 'DESC')->get();
		foreach ($danhmucthuoc as $dmt) {
			echo "<option value='".$dmt->id."'>".$dmt->Ten."</option>";
		}
	}
	public function getQuanHuyen($matp) {
		$quanhuyen = QuanHuyen::where('matp', $matp)->orderby('name', 'DESC')->get();
		echo "<option value=''>Chọn quận hoặc huyện</option>";
		foreach ($quanhuyen as $qh) {
			echo "<option value='".$qh->maqh."'>".$qh->name."</option>";
		}
	}
	public function getPhuongXa($maqh) {
		$phuongxa = PhuongXa::where('maqh', $maqh)->orderby('name', 'DESC')->get();
		echo "<option value=''>Chọn phường hoặc xã</option>";
		foreach ($phuongxa as $px) {
			echo "<option value='".$px->xaid."'>".$px->name."</option>";
		}
	}
	public function getPhongKham($trangthai) {
		$phongkham = PhongKham::where('TrangThai', $trangthai)->get();
		// view()->share('phongkham', $phongkham);
		return view('sever.nhanvien.phongkham.danhsach', ['phongkham' => $phongkham]);
	}
}
