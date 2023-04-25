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
        Schema::create('tinh_huyen_xas', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->tinyInteger('loai')->nullable(); // 1: tỉnh, 2: huyện, 3:xã
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinh_huyen_xas');
    }
};
