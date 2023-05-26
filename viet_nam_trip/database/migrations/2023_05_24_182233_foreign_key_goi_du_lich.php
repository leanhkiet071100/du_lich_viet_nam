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
        Schema::table('goi_du_liches', function (Blueprint $table) {
            $table->foreign('loai_id')->references('id')->on('loai_goi_du_liches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('goi_du_liches', function (Blueprint $table) {
            $table->dropForeign('goi_du_liches_loai_id_foreign');
        });
    }
};
