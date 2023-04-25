<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class danh_gia_dia_diem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'dia_diem_id',
        'nguoi_dung_id',
        'noi_dung',
        'id_binh_luan_cha',
        'sao',
        'ngay',
        'trang_thai',
    ];

    public function dia_diem(){
        return $this->hasMany(sanpham::class, 'ma_san_pham', 'id');
    }

    public function danh_gia_dia_diem_hinh(){
        return $this->belongsTo(danh_gia_dia_diem_hinh::class, 'ma_san_pham', 'id');
    }
}
