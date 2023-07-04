<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hoa_don extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'phieu_dat_id',
        'ngay_thanh_toan',
        'tong_tien',
        'loai_thanh_toan',
        'trang_thai',
    ];
}
