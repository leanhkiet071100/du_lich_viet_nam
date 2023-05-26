<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dia_diems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loai_dia_diem_id')->nullable();
            $table->string('ten_dia_diem');
            $table->text('vi_do')->nullable();
            $table->string('mua_du_lich')->nullable();
            $table->text('mo_ta')->nullable();
            $table->text('noi_dung')->nullable();
            $table->text('hinh_anh_dia_diem')->nullable();
            $table->foreignId('tinh_id')->nullable();
            $table->foreignId('huyen_id')->nullable();
            $table->foreignId('xa_id')->nullable();
            $table->string('chi_tiet_dia_chi')->nullable();
            $table->boolean('noi_bat')->nullable();
            $table->text('trang_thai')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_diems');
    }
};
