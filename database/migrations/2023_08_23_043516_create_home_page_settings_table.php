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
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('nutshut2');
            $table->string('web_logo')->default('logo.svg');
            $table->string('mobile_logo')->default('logo.svg');
            $table->string('footer_logo')->default('logo.svg');
            $table->string('m_footer_logo')->default('logo.svg');
            $table->string('hotline')->default('+88031064735');
            $table->string('mobile')->default('+88031064735');
            $table->string('email')->default('info@nutshut.com');
            $table->string('address')->default('41 #House, 6 #Road, Dhaka 1219');
            $table->string('map')->nullable();
            $table->string('facebook')->default('www.facebook.com');
            $table->string('twitter')->default('www.twitter.com');
            $table->string('youtube')->default('www.youtube.com');
            $table->string('instagram')->default('www.instagram.com');
            $table->string('pinterest')->default('www.pinterest.com');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};