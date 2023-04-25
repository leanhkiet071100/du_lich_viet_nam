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
        Schema::create('noi_luu_trus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dia_diem_id');
            $table->foreignId('nguoi_dung_id');
            $table->string('ten_noi_luu_tru');
            $table->string('dia_chi');
            $table->string('so_dien_thoai');
            $table->string('hinh_noi_luu_tru');
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
        Schema::dropIfExists('noi_luu_trus');
    }
};
