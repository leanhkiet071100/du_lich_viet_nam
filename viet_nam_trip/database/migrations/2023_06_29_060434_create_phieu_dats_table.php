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
        Schema::create('phieu_dats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goi_du_lich_id')->nullable();
            $table->foreignId('nguoi_duyet_id')->nullable();
            $table->string('ten')->nullable();
            $table->string('email')->unique();
            $table->string('so_dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->date('ngay_dat')->nullable();
            $table->text('tre')->nullable();
            $table->string('tre_em')->nullable();
            $table->string('tre_nho')->nullable();
            $table->string('nguoi_lon')->nullable();
            $table->integer('so_luong_dat')->nullable();
            $table->integer('gia_tre_em')->nullable();
            $table->integer('gia_tre_nho')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->string('li_do_huy')->nullable();
            $table->boolean('is_me')->nullable();
            $table->boolean('tu_van')->nullable();
            $table->date('ngay_duyet')->nullable();
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
        Schema::dropIfExists('phieu_dats');
    }
};
