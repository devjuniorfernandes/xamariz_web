<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('tagline')->nullable()->after('title');
            $table->text('strategic_value_para1')->nullable()->after('full_description');
            $table->text('strategic_value_para2')->nullable()->after('strategic_value_para1');
            $table->text('quote')->nullable()->after('strategic_value_para2');
            $table->json('methodology')->nullable()->after('deliverables');
            $table->json('metrics')->nullable()->after('methodology');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'tagline',
                'strategic_value_para1',
                'strategic_value_para2',
                'quote',
                'methodology',
                'metrics',
            ]);
        });
    }
};
