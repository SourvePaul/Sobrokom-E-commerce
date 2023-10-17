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
        Schema::table('transcations', function (Blueprint $table) {
            //
            $table->enum('mode', ['cod','card','paypal'])->default('cod')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transcations', function (Blueprint $table) {
            //
            $table->enum('mode', ['cod','card','paypal'])->default('cod')->after('user_id');
        });
    }
};