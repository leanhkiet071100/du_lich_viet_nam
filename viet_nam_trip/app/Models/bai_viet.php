<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bai_viet extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'nguoi_dung_id',
        'tieu_de',
        'phu_de',
        'hinh_anh_bai_viet',
        'loai_bai_viet',
        'noi_dung',
        'hien',
        'noi_bat',
        'trang_thai',
    ];
    
    public function bai_Viet_binh_luan(){
        return $this->belongsTo(bai_Viet_binh_luan::class, 'bai_viet_id', 'id');
    }

    public function nguoi_dung(){
        return $this->belongsTo(nguoi_dung::class, 'nguoi_dung_id', 'id');
    }
}
