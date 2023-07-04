<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class phieu_dat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nguoi_dung_id',
        'goi_du_lich_id',
        'nguoi_duyet_id',
        'ten',
        'email',
        'so_dien_thoai',
        'ngay_dat',
        'dia_chi',
        'so_tre_em',
        'so_tre_nho',
        'so_nguoi_lon',
        'ghi_chu',
        'li_do_huy',
        'is_me',
        'tu_van',
        'ngay_duyet',
        'ngay_huy',
        'trang_thai',
    ];

}
