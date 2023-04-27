<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'nguoi_dungs';
    protected $fillable = [
        'ten',
        'email',
        'email_verified_at',
        'mat_khau',
        'remember_token',
        'hinh_dai_dien',
        'cap',
        'trang_thai',
        'moi',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    static $statuses = [
        'hoat-dong', 'cho-kich-hoat', 'khong-hoat-dong'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function bai_viet_binh_luan(){
        return $this->hasMany(bai_viet_binh_luans::class, 'ma_nguoi_dung', 'id');
    }

    public function bai_viet(){
        return $this->hasMany(bai_viet::class, 'ma_nguoi_dung', 'id');
    }

    public function cap_nguoi_dung(){
        return $this->belongsTo(cap_nguoi_dung::class, 'cap_id', 'id');
    }
}
