<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dia_diem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'ten_dia_diem',
        'vi_do',
        'mua_du_lich',
        'sao',
        'mo_ta',
        'noi_dung',
        'hinh_anh_dia_diem',
        'chi_tiet_dia_chi',
        'tinh',
        'huyen',
        'xa',
        'noi_bat',
        'trang_thai',
    ];

    protected $primayKey = 'id';
    protected $table = 'dia_diems';

    //khóa ngoại hình ảnh sản phẩm 1
    public function dia_diem_hinh(){
        return $this->belongsTo('App\Models\dia_diem_hinh', 'id', 'dia_diem_id');
    }

    public function danh_gia_dia_diem(){
        return $this->belongsTo(danh_gia_dia_diem::class, 'dia_diem_id', 'id');
    }
    public function quan_an(){
        return $this->belongsTo(quan_an::class, 'dia_diem_id', 'id');
    }
    public function noi_luu_tru(){
        return $this->belongsTo(noi_luu_tru::class, 'dia_diem_id', 'id');
    }

    public function loai_dia_diem(){
        return $this->hasMany('App\Models\loai_dia_diem', 'id', 'loai_dia_diem_id');
    }

    public function tinh(){
        return $this->belongsTo(tinh_huyen_Xa::class, 'tinh_id', 'id');
    }
    public function huyen(){
        return $this->belongsTo(tinh_huyen_Xa::class, 'huyen_id', 'id');
    }
    public function xa(){
        return $this->belongsTo(tinh_huyen_Xa::class, 'xa_id', 'id');
    }


}
