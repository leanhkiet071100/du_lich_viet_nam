<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class loai_goi_du_lich extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'ten',
        'hinh_loai_goi_du_lich',
        'trang_thai',
    ];

    public function goi_du_lich(){
        return $this->hasMany('App\Models\goi_du_lich', 'id', 'goi_du_lich_id');
    }
}
