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
         Schema::table('nguoi_dungs', function (Blueprint $table) {
            $table->foreign('cap_id')->references('id')->on('cap_nguoi_dungs');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nguoi_dungss', function (Blueprint $table) {
            $table->dropForeign('nguoi_dungs_cap_id_id_foreign');
        });
    }
};
