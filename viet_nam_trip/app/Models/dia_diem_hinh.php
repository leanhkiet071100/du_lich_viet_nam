<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\CalendarLinks\Link;
use Jorenvh\Share\ShareFacade;

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
        return $this->hasMany('App\Models\dia_diem', 'id', 'dia_diem_id');
    }
}
