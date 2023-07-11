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
            $table->foreignId('dia_diem_id')->nullable();
            // $table->foreignId('nguoi_dung_id')->nullable();
            $table->string('ten_quan_an');
            $table->string('tinh')->nullable();
            $table->string('huyen')->nullable();
            $table->string('xa')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('hinh_quan_an')->nullable();
            $table->string('mo_ta')->nullable();
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
        Schema::dropIfExists('quan_ans');
    }
};
