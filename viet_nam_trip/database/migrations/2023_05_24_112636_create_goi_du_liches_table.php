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
        Schema::create('goi_du_liches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loai_id');
            $table->text('ten')->nullable();
            $table->text('hinh_goi_du_lich')->nullable();
            $table->string('noi_khoi_hanh')->nullable();
            $table->timestamp('thoi_gian_tap_trung')->nullable();
            $table->string('so_nguoi_toi_da')->nullable();
            $table->time('gio_khoi_hanh')->nullable();
            $table->date('ngay_khoi_hanh')->nullable();
            $table->integer('gia_nguoi_lon')->nullable();
            $table->integer('gia_tre_em')->nullable();
            $table->integer('gia_tre_nho')->nullable();
            $table->integer('so_ngay')->nullable();
            $table->integer('so_dem')->nullable();
            $table->integer('sao')->nullable();
            $table->text('not_compo')->nullable();
            $table->text('compo')->nullable();
            $table->text('thong_tin_dich_vu')->nullable();
            $table->text('dieu_kien_ap_dung')->nullable();
            $table->string('trang_thai')->nullable();
            $table->boolean('noi_bat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goi_du_liches');
    }
};
