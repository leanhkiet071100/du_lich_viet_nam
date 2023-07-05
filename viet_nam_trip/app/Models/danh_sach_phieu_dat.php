<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class danh_sach_phieu_dat extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'phieu_dat_id',
        'ho_ten',
        'gioi_tinh',
        'ngay',
        'thang',
        'nam',
        'loai',
    ];
}
