<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class web extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'ten',
        'so_dien_thoai',
        'web',
        'email',
        'dia_chi',
        'ban_do',
        'tieu_de_noi_dung',
        'noi_dung',
        'tieu_de_mo_ta',
        'mo_ta',
        'hinh',
    ];
    protected $table = 'webs';
}
