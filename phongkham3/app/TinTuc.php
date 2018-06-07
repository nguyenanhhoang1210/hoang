<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model {
	protected $table = "TinTuc";
	public function danhmuctintuc() {
		return $this->belongsTo('App\DanhMucTinTuc', 'idDanhMuc', 'id');
	}
}
