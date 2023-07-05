<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class goi_du_lich extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'loai_id',
        'ten',
        'hinh_goi_du_lich',
        'noi_khoi_hanh',
        'thoi_gian_tap_trung',
        'so_nguoi_toi_da',
        'gio_khoi_hanh',
        'ngay_khoi_hanh',
        'gia_nguoi_lon',
        'gia_tre_em',
        'gia_tre_nho',
        'so_ngay',
        'so_dem',
        'not_compo',
        'compo',
        'thong_tin_dich_vu',
        'dieu_kien_ap_dung',
        'trang_thai',
        'noi_bat',
    ];

    public function loai_goi_du_lich(){
        return $this->hasMany('App\Models\loai_goi_du_lich', 'id', 'loai_id');
    }

    public function lich_dat(){
        return $this->hasMany('App\Models\lich_dat', 'id', 'goi_du_lich_id');
    }

    public function lich_trinh(){
        return $this->hasMany('App\Models\lich_trinh', 'id', 'goi_du_lich_id');
    }

    public function phieu_dat(){
        return $this->hasMany('App\Models\phieu_dat', 'goi_du_lich_id', 'id');
    }
}
