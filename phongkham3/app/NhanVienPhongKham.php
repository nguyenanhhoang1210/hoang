<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Notifialble;
class NhanVienPhongKham extends Authenticatable
{
    
    protected $table = "nhanvienphongkham";
    protected $primaryKey = "manv";
    protected $guard="nhanvienphongkham";
    public $timestamps = false;
    protected $fillable = [
        'tennhanvien', 'email', 'password',
    ];

  
    protected $hidden = [
        'password', 'remember_token',
    ];


	public function loainv()
	{
		return $this->belongsTo('App\LoaiNhanVien','maloai','manv');
	}
    
}
