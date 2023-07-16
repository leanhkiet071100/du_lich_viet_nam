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
        // Schema::create('chi_tiet_phieu_dats', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('phieu_dat_id')->nullable();
        //     $table->string('ho_ten')->nullable();
        //     $table->boolean('gioi_tinh')->nullable();
        //     $table->date('ngay_sinh')->nullable();
        //     $table->string('loai')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('chi_tiet_phieu_dats');
    }
};
