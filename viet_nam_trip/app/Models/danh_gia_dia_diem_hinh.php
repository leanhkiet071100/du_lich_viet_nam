<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class danh_gia_dia_diem_hinh extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'danh_gia_dia_diem_id',
        'ten',
        'trang_thai',
    ];

    public function danh_gia_dia_diem(){
        return $this->hasMany('App\Models\danh_gia_dia_diem', 'danh_gia_dia_diem_id');
    }
}
