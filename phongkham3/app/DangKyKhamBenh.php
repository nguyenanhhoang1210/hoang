<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangKyKhamBenh extends Model {
	protected $table      = "dangkykhambenh";
	protected $primaryKey = "makhambenh";
	public $timestamps    = false;

	public function nguoidangky() {
		return $this->belongsTo('App\NguoiDangKy', 'madangky', 'makhambenh');
	}
	public function benhnhan() {
		return $this->belongsTo('App\BenhNhan', 'mabenhnhan', 'makhambenh');
	}
	public function lichkham() {
		return $this->belongsTo('App\LichKham', 'malich', 'makhambenh');
	}

}