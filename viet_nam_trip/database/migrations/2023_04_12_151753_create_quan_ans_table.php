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
        Schema::create('quan_ans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dia_diem_id');
            $table->foreignId('nguoi_dung_id');
            $table->string('ten_quan_an');
            $table->foreignId('tinh_id')->nullable();
            $table->foreignId('huyen_id')->nullable();
            $table->foreignId('xa_id')->nullable();
            $table->string('dia_chi');
            $table->string('so_dien_thoai');
            $table->string('hinh_quan_an');
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
        Schema::dropIfExists('quan_ans');
    }
};
