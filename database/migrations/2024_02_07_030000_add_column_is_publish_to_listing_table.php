<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('listing', function (Blueprint $table) {
            Schema::table('listings', function (Blueprint $table) {
                $table->unsignedTinyInteger('is_published')->default('0');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropColumns('listings', [
            'is_published'
        ]);
    }
};
