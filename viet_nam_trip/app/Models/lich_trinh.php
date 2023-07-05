<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lich_trinh extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'goi_du_lich_id',
        'ten',
        'ngay_lich_trinh',
        'noi_dung',
    ];

    public function goi_du_lich(){
        return $this->hasMany('App\Models\goi_du_lich', 'id', 'goi_du_lich_id');
    }
}


