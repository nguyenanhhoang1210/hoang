<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucTinTuc extends Model {
	protected $table   = "DanhMucTinTuc";
	public $timestamps = false;
	public function tintuc() {
		return $this->hasMany('App\TinTuc', 'idDanhMuc', 'id');
	}
}