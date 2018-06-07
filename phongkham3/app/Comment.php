<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $table ="Comment";



	public function phongkham()
	{
		return $this->belongsTo('App\PhongKham','id','idphongkham');
	}
	public function nguoidangky()
	{
		return $this->belongsTo('App\NguoiDangKy','idnguoidangky','madangky');
	}
}
