<?php

namespace App\Http\Controllers;

use App\HopDong;
use App\PhongKham;
use App\PhuongXa;
use App\QuanHuyen;
use App\TinhThanh;

use Illuminate\Http\Request;

class PhongKhamController extends Controller {
	public function getDanhSach() {
		$phongkham = PhongKham::all();
		return view('sever.nhanvien.phongkham.danhsach', ['phongkham' => $phongkham]);
	}

	public function getThem() {
		$tinhthanh = TinhThanh::orderby('name', 'DESC')->get();
		return view('sever.nhanvien.phongkham.them', ['tinhthanh' => $tinhthanh]);
	}
	public function postThem(Request $request) {
		$this->validate($request,
			[
				'Ten'           => 'required|min:3',
				'email'         => 'required|email|unique:PhongKham,email',
				'password'      => 'required|min:3|max:32',
				'Sdt'           => 'required|min:10|max:12|regex:/^[0-9]+$/u',
				'passwordAgain' => 'required|same:password'
			],
			[
				'Ten.required'           => 'Bạn chưa nhập tên người dùng',
				'Ten.min'                => 'Tên người dùng phải có ít nhất 3 ký tự',
				'email.required'         => 'Bạn chưa nhập email',
				'email.email'            => 'Bạn chưa nhập đúng định dạng Email',
				'email.unique'           => 'Email đã tồn tại',
				'password.required'      => 'Bạn chưa nhập password',
				'password.min'           => 'Password phải có ít nhất 3 ký tự',
				'Password.max'           => 'Password có tối đa 32 ký tự',
				'passwordAgain.required' => 'Bạn chưa lại password',
				'passwordAgain.same'     => 'Bạn chưa nhập đúng password',
				'Sdt.required'           => 'Bạn chưa nhập số điện thoại',
				'Sdt.min'                => 'Điện thoại có ít nhất 10 số',
				'Sdt.max'                => 'Điện thoại có tối đa 12 số',
				'Sdt.regex'              => 'Số điện thoại chỉ được nhập số',
			]);
		$tkphongkham                = new PhongKham;
		$tkphongkham->tenphongkham  = $request->Ten;
		$tkphongkham->xaid          = $request->idPhuongXa;
		$tkphongkham->diaChiChiTiet = $request->diaChiChiTiet;
		$tkphongkham->email         = $request->email;
		$tkphongkham->Sdt           = $request->Sdt;
		$tkphongkham->password      = bcrypt($request->password);
		$tkphongkham->TrangThai     = "off";
		$tkphongkham->save();

		return redirect('sever/nhanvien/phongkham/them')->with('thongbao', 'Bạn đã thêm tài khoản phòng khám thành công');

	}

	public function getSua($id) {
		$tkphongkham = PhongKham::find($id);
		$tinhthanh   = TinhThanh::orderby('name', 'DESC')->get();
		$math        = $tkphongkham->phuongxa->quanhuyen->tinhthanh->matp;
		$maqh        = $tkphongkham->phuongxa->quanhuyen->maqh;
		$quanhuyen   = QuanHuyen::where('matp', $math)->orderby('name', 'DESC')->get();
		$phuongxa    = PhuongXa::where('maqh', $maqh)->orderby('name', 'DESC')->get();
		return view('sever.nhanvien.phongkham.sua', ['tkphongkham' => $tkphongkham, 'tinhthanh' => $tinhthanh, 'quanhuyen' => $quanhuyen, 'phuongxa' => $phuongxa]);
	}

	public function postSua(Request $request, $id) {
		$tkphongkham = PhongKham::find($id);
		$this->validate($request,
			[
				'Ten' => 'required|min:3|max:32',
				'Sdt' => 'required|min:10|max:12|regex:/^[0-9]+$/u',
			],
			[
				'Ten.required' => 'Bạn chưa nhập tên phòng khám',
				'Ten.min'      => 'Tên phòng khám phải có ít nhất 3 ký tự',
				'Ten.max'      => 'Tên phòng khám phải có tối đa 32 ký tự',
				'Sdt.required' => 'Bạn chưa nhập số điện thoại',
				'Sdt.min'      => 'Điện thoại có ít nhất 10 số',
				'Sdt.max'      => 'Điện thoại có tối đa 12 số',
				'Sdt.regex'    => 'Số điện thoại chỉ được nhập số',

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
			$tkphongkham->password = bcrypt($request->passwordnew);

		}
		$tkphongkham->tenphongkham  = $request->Ten;
		$tkphongkham->TrangThai     = $request->TrangThai === "on"?"on":"off";
		$tkphongkham->xaid          = $request->idPhuongXa;
		$tkphongkham->diaChiChiTiet = $request->diaChiChiTiet;
		$tkphongkham->Sdt           = $request->Sdt;
		$tkphongkham->save();

		return redirect('sever/nhanvien/phongkham/sua/'.$id)->with('thongbao', 'Bạn đã sửa thông tin phòng khám thành công');
	}

	public function getXoa($id) {
		$PhongKham = PhongKham::find($id);
		$hopdong   = HopDong::where('idPhongKham', $PhongKham->id)->get();
		$dem       = count($hopdong);
		if ($dem == 0) {
			$PhongKham->delete();
			return redirect('sever/nhanvien/phongkham/danhsach')->with('thongbao', 'Bạn đã xoá thành công  ');
		}
		if ($dem > 0) {
			return redirect('sever/nhanvien/phongkham/danhsach')->with('thongbaoloi', 'Còn tồn tại ràng buộc với bảng hợp đồng nên không thể xoá');
		}
	}

}