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
        Schema::create('goi_du_lich_binh_luans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goi_du_lich_id');
            $table->foreignId('nguoi_dung_id');
            $table->foreignId('binh_luan_id')->nullable();
            $table->integer('sao')->nullable();
            $table->text('noi_dung')->nullable();
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
        Schema::dropIfExists('goi_du_lich_binh_luans');
    }
};
