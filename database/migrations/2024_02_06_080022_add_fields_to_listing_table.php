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
        Schema::table('listings', function (Blueprint $table) {
            $table->Text('title');
            $table->Text('description');
            $table->tinyText('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
//        Schema::table('listing', function (Blueprint $table) {
//            //
//        });
        Schema::dropColumns('listings', [
            'title', 'description', 'status'
        ]);
    }
};
