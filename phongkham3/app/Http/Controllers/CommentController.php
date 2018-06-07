<?php

namespace App\Http\Controllers;

use App\Comment;
use App\PhongKham;
use App\NguoiDangKy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
	public function getXoa($id, $idTinTuc) {
		$comment = Comment::find($id);
		$comment->delete();

		return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Bạn đã xoá comment thành công');
	}
	public function postComment($id, Request $request) {
		$idPhongKham         = $id;
		$phongkham            = PhongKham::find($id);
		$comment           = new Comment;
		$comment->idphongkham = $idPhongKham;
		$comment->idnguoidangky   = Auth::guard('nguoidangky')->user()->madangky;
		$comment->noidung  = $request->noidung;
		$comment->save();
		return redirect()->back()->with('thongbao', 'Viết bình luận thành công');
	}
}
