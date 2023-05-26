<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class loai_dia_diem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'ten',
        'hinh_loai_dia_diem',
        'hien',
        'noi_bat',
        'trang_thai'
    ];

    public function dia_diem(){
        return $this->belongsTo('App\Models\dia_diem', 'id', 'loai_dia_diem_id');
    }
}
