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
        Schema::table('dia_diem_hinhs', function (Blueprint $table) {
            $table->foreign('dia_diem_id')->references('id')->on('dia_diems');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dia_diem_hinh', function (Blueprint $table) {
            $table->dropForeign('dia_diem_hinhs_dia_diem_id_foreign');
        });
    }
};
