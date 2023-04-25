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
        Schema::create('danh_gia_dia_diems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dia_diem_id');
            $table->foreignId('nguoi_dung_id')->nullable();
            $table->foreignId('binh_luan_id')->nullable();
            $table->text('noi_dung')->nullable();
            $table->integer('sao')->nullable();
            $table->time('ngay')->nullable();
            $table->boolean('hien')->nullable();
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
        Schema::dropIfExists('danh_gia_dia_diems');
    }
};
