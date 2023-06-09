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
        'parent_id',
        'loai',
    ];

    public function tinh(){
        return $this->hasMany('App\Models\tinh_huyen_xa', 'parent_id', 'id');
    }
    public function huyen(){
        return $this->hasMany('App\Models\tinh_huyen_xa', 'parent_id', 'id');
    }
    public function xa(){
        return $this->hasMany('App\Models\tinh_huyen_xa', 'parent_id', 'id');
    }
}
