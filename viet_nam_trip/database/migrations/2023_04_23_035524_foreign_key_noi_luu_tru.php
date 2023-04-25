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
        Schema::table('noi_luu_trus', function ($table) {      
            $table->foreign('dia_diem_id')->references('id')->on('dia_diems');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('noi_luu_trus', function (Blueprint $table) {
            $table->dropForeign('quan_ans_dia_diem_id_foreign');
        });
    }
};
