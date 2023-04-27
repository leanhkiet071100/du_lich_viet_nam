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
        Schema::create('cap_nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('chuc_danh')->nullable();
            $table->boolean('is_admin')->nullable();;
            $table->softDeletes();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cap_nguoi_dungs');
    }
};
