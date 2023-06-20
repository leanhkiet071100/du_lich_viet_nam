<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class noi_luu_tru extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'dia_diem_id',
        'ten_noi_luu_tru',
        'tinh',
        'huyen',
        'xa',
        'dia_chi',
        'so_dien_thoai',
        'hinh_noi_luu_tru',
        'trang_thai',
    ];

    public function dia_diem(){
        return $this->belongsTo(dia_diem::class, 'dia_diem_id', 'id');
    }
}
