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
        Schema::create('mon_ans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quan_an_id');
            $table->string('ten_mon')->nullable();
            $table->string('gia_ban')->nullable();
            $table->string('hinh_mon_an')->nullable();
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
        Schema::dropIfExists('mon_ans');
    }
};
