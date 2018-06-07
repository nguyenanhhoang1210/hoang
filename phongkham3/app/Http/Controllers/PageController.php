<?php

namespace App\Http\Controllers;
use App\BenhNhan;
use App\ChuyenKhoa;
use App\LichNghiKham;
use App\ChuyenKhoaPhongKham;
use App\DangKyKhamBenh;
use App\CaKham;
use App\LoaiNhanVien;
use App\NguoiDangKy;
use App\NhanVienPhongKham;
use App\BuongKham;
use App\phongkham;
use App\User;
use App\PhieuKhamBenh;
use App\TinhThanh;
use App\PhuongXa;
use Auth;
use DB;
use Hash;

use Illuminate\Http\Request;

class PageController extends Controller {
	public function getIndex() {
		Auth::logout();
		Auth::guard('phongkham')->logout();
		$nguoidangky = NguoiDangKy::all();
		$benhnhan    = BenhNhan::all();
		$tinhthanh= TinhThanh::all();
		$phuongxa=PhuongXa::all();
		$chuyenkhoa=ChuyenKhoa::all();
 		$phongkham= PhongKham::where('TrangThai','on')->paginate(6);
		return view('page.trangchu', compact('nguoidangky', 'benhnhan','phongkham','tinhthanh','phuongxa','chuyenkhoa'));
	}

	

	public function getGioiThieu() {
		Auth::logout();
		Auth::guard('phongkham')->logout();
		return view('page.gioithieu');
	}
	public function getChitiet(Request $req){
        $phongkham = PhongKham::where('id',$req->id)->first();

        $chuyenkhoa = DB::table('chuyenkhoaphongkham')->select('*')->join('chuyenkhoa', 'chuyenkhoa.id', '=', 'chuyenkhoaphongkham.idKhoa')->where('idPhongKham',$req->id)->get();
         $dichvu = DB::table('dichvuphongkham')->select('*')->join('dichvu', 'dichvu.id', '=', 'dichvuphongkham.madichvu')->where('maphongkham',$req->id)->get();
        $cakham=CaKham::all();
        $comment=DB::table('comment')->select('*')->join('nguoidangky', 'nguoidangky.madangky', '=', 'comment.idnguoidangky')->where('idphongkham',$req->id)->get();
       
    	return view('page.chitietphongkham',compact('phongkham','cakham','chuyenkhoa','dichvu','comment'));
    }
	public function getDanhSach(){
       $phongkham= PhongKham::where('TrangThai','on')->get();
       
    	return view('page.danhsachphongkham',compact('phongkham'));
    }
	public function getDatKham($id){
       
        if ((Auth::guard('nguoidangky')->check())) {
	        $cakham=CaKham::all();
	       	$phongkham = PhongKham::where('id',$id)->first();
	    	return view('page.datkham',compact('phongkham','cakham'));
   		 }
   		 else
   		 {
   		 	return view('page.dangnhap2');
   		 	
   		 }
   		 
    }
	
	public function getLogin() {
		Auth::logout();
		Auth::guard('phongkham')->logout();
		return view('page.dangnhap');
	}
	public function getLogin2() {
		Auth::logout();
		Auth::guard('phongkham')->logout();
		return view('page.dangnhap2');
	}
	public function getLogin3() {
		Auth::logout();
		Auth::guard('nguoidangky')->logout();
		return view('page.dangnhap3');
	}
	public function getSignin() {
		return view('page.dangki');
	}
	public function getSigninPK() {
		$tinhthanh   = TinhThanh::orderby('name', 'DESC')->get();
		return view('page.dangkyphongkham',compact('tinhthanh'));
	}

	public function postSignin(Request $req) {
		$this->validate($req,
			[
				'email'       => 'required|email|unique:nguoidangky,email',
				'password'    => 'required|min:6|max:20',
				'fullname'    => 'required',
				're_password' => 'required|same:password'
			],
			[
				'email.required'    => 'Vui lòng nhập email',
				'email.email'       => 'Không đúng định dạng email',
				'email.unique'      => 'Email đã có người sử dụng',
				'password.required' => 'Vui lòng nhập mật khẩu',
				're_password.same'  => 'Mật khẩu không giống nhau',
				'password.min'      => 'Mật khẩu ít nhất 6 kí tự'
			]);
		$ndk           = new NguoiDangKy();
		$ndk->hoten    = $req->fullname;
		$ndk->email    = $req->email;
		$ndk->password = Hash::make($req->password);
		$ndk->sdt      = $req->phone;
		$ndk->diachi   = $req->address;

		$ndk->save();
		return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');
		
	}
	public function postSigninPK(Request $request) {
		$this->validate($request,
			[
				'Ten'           => 'required|min:3',
				'email'         => 'required|email|unique:phongkham,email',
				'password'      => 'required|min:3|max:32',
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
			]);
		$phongkham            = new phongkham;
		$phongkham->tenphongkham       = $request->Ten;
		$phongkham->email     = $request->email;
		$phongkham->Sdt       = $request->sdt;
		$phongkham->diaChiChiTiet       = $request->diachi;
		$phongkham->xaid          = $request->idPhuongXa;

		$phongkham->password  = bcrypt($request->password);
		$phongkham->TrangThai = "off";
		$phongkham->save();
		return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');
	}
	public function postLogin2(Request $req) {
		$this->validate($req,
			[
				'email'    => 'required|email',
				'password' => 'required|min:6|max:20'
			],
			[
				'email.required'    => 'Vui lòng nhập email',
				'email.email'       => 'Email không đúng định dạng',
				'password.required' => 'Vui lòng nhập mật khẩu',
				'password.min'      => 'Mật khẩu ít nhất 6 kí tự',
				'password.max'      => 'Mật khẩu không quá 20 kí tự'
			]
		);
		$credentials       = array('email' => $req->email, 'password' => $req->password);
		
		$ndk = NguoiDangKy::where([
				['email', '=', $req->email],

			])->first();
		
		if ( $ndk ) {
			if (Auth::guard('nguoidangky')->attempt($credentials) ) {
				if ($ndk) {
					return redirect()->back();
				} 
			} else {
				return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
			}
		} else {
			return redirect()->back()->with(['flag' => 'danger', 'message' => 'Tài khoản chưa kích hoạt']);
		}

	}
	public function postLogin(Request $req) {
		$this->validate($req,
			[
				'email'    => 'required|email',
				'password' => 'required|min:6|max:20'
			],
			[
				'email.required'    => 'Vui lòng nhập email',
				'email.email'       => 'Email không đúng định dạng',
				'password.required' => 'Vui lòng nhập mật khẩu',
				'password.min'      => 'Mật khẩu ít nhất 6 kí tự',
				'password.max'      => 'Mật khẩu không quá 20 kí tự'
			]
		);
		$credentials       = array('email' => $req->email, 'password' => $req->password);
		
		$ndk = NguoiDangKy::where([
				['email', '=', $req->email],

			])->first();
		

		if ( $ndk ) {
			if ( Auth::guard('nguoidangky')->attempt($credentials)) {
				if ($ndk) {
					return redirect()->route('trang-chu');
				} 
			} else {
				return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
			}
		} else {
			return redirect()->back()->with(['flag' => 'danger', 'message' => 'Tài khoản chưa kích hoạt']);
		}

	}
	public function postLogin3(Request $req) {
		$this->validate($req,
			[
				'email'    => 'required|email',
				'password' => 'required|min:6|max:20'
			],
			[
				'email.required'    => 'Vui lòng nhập email',
				'email.email'       => 'Email không đúng định dạng',
				'password.required' => 'Vui lòng nhập mật khẩu',
				'password.min'      => 'Mật khẩu ít nhất 6 kí tự',
				'password.max'      => 'Mật khẩu không quá 20 kí tự'
			]
		);
		$credentials       = array('email' => $req->email, 'password' => $req->password);
		$nhanvienphongkham = NhanVienPhongKham::where([
				['email', '=', $req->email],

			])->first();
		$pk = phongkham::where([
				['email', '=', $req->email],

			])->first();

		if ($nhanvienphongkham  || $pk) {
			if (Auth::guard('nhanvienphongkham')->attempt($credentials) || Auth::guard('phongkham')->attempt($credentials)) {
					if ($pk) {
						return redirect()->route('danhsachchuyenkhoa');
					} 
				 else {

					return redirect()->route('thongtinnv');
				}
			} else {
				return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
			}
		} else {
			return redirect()->back()->with(['flag' => 'danger', 'message' => 'Tài khoản chưa kích hoạt']);
		}

	}
	public function postLogout() {
		Auth::logout();
		Auth::guard('nhanvienphongkham')->logout();
		Auth::guard('nguoidangky')->logout();
		Auth::guard('phongkham')->logout();

		return redirect()->route('trang-chu');
	}
	
	public function postDatKham(Request $req,$id) {
		
		$bn = new BenhNhan();
		$bn->tenbenhnhan    = $req->hoten;
		$bn->gioitinh=$req->gender;
		$bn->sdt      = $req->sdt;
		$bn->diachi   = $req->diachi;
		$phieukhambenh= new DangKyKhamBenh();
		$phieukhambenh->lydokham=$req->lydokham;
		$phieukhambenh->madangky=Auth::guard('nguoidangky')->user()->madangky;
		$phieukhambenh->mabenhnhan= BenhNhan::max('mabenhnhan')  + 1;
		$phieukhambenh->maca=$req->cakham;
		$phieukhambenh->maphongkham=$id;
		$phieukhambenh->tinhtrang=0;
		$phieukhambenh->ngaykham=$req->ngaykham;
		$bn->save();
		$phieukhambenh->save();

		
		return redirect()->back()->with('thongbao', 'Bạn đã đặt lịch thành công');
		
	}
	public function getTimKiem(Request $req)
	{
		$phongkham = PhongKham::where('tenphongkham','like','%'.$req->key.'%')->where('TrangThai','on')->get();
		return view('page.timkiem', compact('phongkham'));
	}
	public function postTimKiem(Request $request) {
			$tukhoa = $request->idPhuongXa;
		    
			$phongkham = PhongKham::where('xaid', 'like', "%$tukhoa%")->where('TrangThai','on')->get();
			$dem         = count($phongkham);
			return view('page.timkiem', ['phongkham' => $phongkham, 'tukhoa' => $tukhoa, 'dem' => $dem]);
		
	}
	public function getTimKiem2($id)
	{
		$phongkham = DB::table('chuyenkhoaphongkham')->select('*')->join('phongkham', 'phongkham.id', '=', 'chuyenkhoaphongkham.idPhongKham')->where('idKhoa', $id)->where('TrangThai','on')->get();
		return view('page.timkiem', compact('phongkham'));
	}
	
	
}
