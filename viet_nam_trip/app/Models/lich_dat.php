<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lich_dat extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'nguoi_dung_id',
        'goi_du_lich_id',
    ];

    public function goi_du_lich(){
        return $this->hasMany('App\Models\goi_du_lich', 'id', 'goi_du_lich_id');
    }

    public function nguoi_dung(){
        return $this->hasMany('App\Models\User', 'id', 'nguoi_dung_id');
    }
}
