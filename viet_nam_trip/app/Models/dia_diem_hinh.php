<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dia_diem_hinh extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'dia_diem_id',
        'ten',
        'trang_thai',
    ];

    public function dia_diem(){
        return $this->hasMany(dia_diem::class, 'dia_diem_id', 'id');
    }
}
