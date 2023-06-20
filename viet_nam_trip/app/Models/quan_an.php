<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class quan_an extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'dia_diem_id',
        'ten_quan_an',
        'tinh',
        'huyen',
        'xa',
        'dia_chi',
        'so_dien_thoai',
        'hinh_quan_an',
        'trang_thai',
    ];

    public function dia_diem(){
        return $this->hasMany(dia_diem::class, 'dia_diem_id', 'id');
    }

    public function mon_an(){
        return $this->belongsTo(mon_an::class, 'quan_an_id', 'id');
    }
}
