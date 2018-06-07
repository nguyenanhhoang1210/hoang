<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PhongKhamResetPasswordNotification;

class PhongKham extends Authenticatable {
	use Notifiable;
	protected $table      = "phongkham";
	protected $primaryKey = "id";
	protected $guard      = "phongkham";

	protected $fillable   = [
		'tenphongkham', 'email', 'password',
	];

	protected $hidden = [
		'password', 'remember_token',
	];
	public function chuyenkhoaphongkham() {
		return $this->hasMany('App\ChuyenKhoaPhongKham', 'id', 'id');
	}
	public function dichvuphongkham() {
		return $this->hasMany('App\DichVuPhongKham', 'id', 'id');
	}
	public function buongkham(){
        return $this->hasMany('App\BuongKham','mabuongkham','madangky');
    }
    public function phuongxa() {
		return $this->belongsTo('App\PhuongXa', 'xaid', 'xaid');
	}
	public function sendPasswordResetNotification($token)
    {
        $this->notify(new PhongKhamResetPasswordNotification($token));
    }
    public function hopdong() {
		return $this->hasMany('App\HopDong', 'idPhongKham', 'maHD');
	}
	public function giahanhopdong() {
		return $this->hasManyThrough('App\GiaHanHopDong', 'App\HopDong', 'idPhongKham', 'maHD', 'id', 'maHD');
	}
}
