<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bai_viet_binh_luan extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'bai_viet_id',
        'nguoi_dung_id',
        'binh_luan_id',
        'noi_dung',
        'hien',
        'trang_thai',
    ];

    public function baiviet(){
        return $this->hasMany(bai_Viet::class, 'ma_bai_viet', 'id');
    }

    public function nguoidung(){
        return $this->hasMany(nguoi_dung::class, 'ma_nguoi_dung', 'id');
    }
    public function binh_luan(){
        return $this->hasMany('App\Models\bai_viet_binh_luan', 'binh_luan_id', 'id');
    }
}
