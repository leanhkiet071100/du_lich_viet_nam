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
            $table->string('ten')->nullable();
            $table->text('hinh_goi_du_lich')->nullable();
            $table->string('quoc_gia')->nullable();
            $table->string('noi_khoi_hanh')->nullable();
            $table->timestamp('tap_trung')->nullable();
            $table->string('so_nguoi_toi_da')->nullable();
            $table->time('gio_khoi_hanh')->nullable();
            $table->date('ngay_khoi_hanh')->nullable();
            $table->integer('gia')->nullable();
            $table->string('so_ngay_du_lich')->nullable();
            $table->text('mo_ta')->nullable();
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
