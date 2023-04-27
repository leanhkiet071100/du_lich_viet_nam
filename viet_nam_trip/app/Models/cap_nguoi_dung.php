<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cap_nguoi_dung extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    static $user = 'user';

    protected $fillable = [
        'ten',
        'chuc_danh',
        'is_admin',
    ];

    public function nguoi_dung(){
        return $this->hasMany(cap_nguoi_dung::class, 'cap_id', 'id');
    }
}
