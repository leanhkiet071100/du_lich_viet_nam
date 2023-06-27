<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mon_an extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'quan_an_id',
        'ten_mon',
        'gia_ban',
        'noi_bat',
        'trang_thai',
    ];

    public function quan_an(){
        return $this->hasMany(quan_an::class, 'quan_an_id', 'id');
    }
}
