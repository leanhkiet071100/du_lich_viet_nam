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
    }

    public function danh_gia_dia_diem_hinh(){
        return $this->belongsTo('App\Models\danh_gia_dia_diem_hinh', 'danh_gia_dia_diem_id','id');
    }
}
