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
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mat_khau')->nullable();
            $table->rememberToken(); // token người dùng
            $table->string('hinh_dai_dien')->nullable();
            $table->string('cap')->nullable(); // 0: host, 1: admin, 2: người dùng,3: shippper
            $table->text('mo_ta')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->boolean('is_admin')->nullable();
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
        Schema::dropIfExists('nguoi_dungs');
    }
};
