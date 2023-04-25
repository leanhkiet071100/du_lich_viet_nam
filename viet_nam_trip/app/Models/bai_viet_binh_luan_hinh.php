<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bai_viet_binh_luan_hinh extends Model
{
    use HasFactory;
     public $timestamps = true;

    protected $fillable = [
        'bai_viet_binh_luan_id',
        'ten',
        'trang_thai',
    ];

    public function baiviet(){
        return $this->hasMany(bai_viet_binh_luan::class, 'ma_bai_viet', 'id');
    }
}
