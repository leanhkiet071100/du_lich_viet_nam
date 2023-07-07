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

    static $statuses = [
        0 => 'Chưa Thanh toán', 1 => 'Đã trả tiền', 2 => 'Hoàn trả', 3 => 'Đã hoàn trả', 4 => 'Đã hủy'
    ];

    public function phieu_dat(){
        return $this->hasOne('App\Models\phieu_dat', 'phieu_dat_id', 'id');
    }

}
