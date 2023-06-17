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
        Schema::create('webs', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('web')->nullable();
            $table->string('email')->nullable();
            $table->text('dia_chi')->nullable();
            $table->text('ban_do')->nullable();
            $table->string('tieu_de_noi_dung')->nullable();
            $table->text('noi_dung')->nullable();
            $table->string('tieu_de_mo_ta')->nullable();
            $table->text('mo_ta')->nullable();
            $table->text('hinh')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webs');
    }
};
