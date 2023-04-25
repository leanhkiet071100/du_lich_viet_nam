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
        Schema::create('bai_viet_binh_luans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bai_viet_id');
            $table->foreignId('nguoi_dung_id');
            $table->foreignId('binh_luan_id')->nullable();
            $table->text('noi_dung')->nullable();
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
        Schema::dropIfExists('bai_viet_binh_luans');
    }
};
