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
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoi_dung_id')->nullable();
            $table->string('tieu_de');
            $table->string('phu_de')->nullable();
            $table->string('hinh_anh_bai_viet')->nullable();;
            // $table->string('loai_bai_viet')->nullable();
            $table->text('noi_dung')->nullable();
            $table->boolean('hien')->nullable();
            $table->boolean('noi_bat')->nullable();
            $table->string('trang_thai')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_viets');
    }
};
