<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tinh_huyen_xa extends Model
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

    public function tinh(){
        return $this->hasMany(dia_diem::class, 'tinh_id', 'id');
    }
    public function huyen(){
        return $this->hasMany(dia_diem::class, 'huyen_id', 'id');
    }
    public function xa(){
        return $this->hasMany(dia_diem::class, 'xa_id', 'id');
    }
}
