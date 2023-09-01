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
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('number_of_vacancy');
            $table->integer('experience');
            $table->string('gender');
            $table->string('salary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('number_of_vacancy');
            $table->dropColumn('experience');
            $table->dropColumn('gender');
            $table->dropColumn('salary');
        });
    }
};
