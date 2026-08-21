<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('logo_path')->nullable();
            $table->string('logo_white_path')->nullable();
            $table->string('sector')->nullable();
            $table->string('website_url')->nullable();
            $table->text('description')->nullable();
            $table->text('testimonial_text')->nullable();
            $table->string('testimonial_author')->nullable();
            $table->string('testimonial_role')->nullable();
            $table->boolean('show_in_marquee')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
