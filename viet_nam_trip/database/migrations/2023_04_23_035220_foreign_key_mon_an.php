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
        Schema::table('mon_ans', function ($table) {      
            $table->foreign('quan_an_id')->references('id')->on('quan_ans');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mon_ans', function (Blueprint $table) {
            $table->dropForeign('mon_ans_quan_an_id_foreign');
        });
    }
};
