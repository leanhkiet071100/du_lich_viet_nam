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
        'quoc_gia',
        'hinh_goi_du_lich',
        'noi_khoi_hanh',
        'tap_trung',
        'so_nguoi_toi_da',
        'gio_khoi_hanh',
        'ngay_khoi_hanh',
        'gia',
        'so_ngay_du_lich',
        'mo_ta',
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
}
