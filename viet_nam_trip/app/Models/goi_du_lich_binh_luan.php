<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\CalendarLinks\Link;
use Jorenvh\Share\ShareFacade;

class goi_du_lich_binh_luan extends Model
{
    use HasFactory;
     use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'goi_du_lich_id',
        'nguoi_dung_id',
        'binh_luan_id',
        'noi_dung',
        'sao',
        'trang_thai',
    ];

    public function goi_du_lich(){
        return $this->hasMany('App\Models\goi_du_lich', 'goi_du_lich_id', 'id');
    }
}
