<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_leads', function (Blueprint $table) {
            // Sobrenome e mensagem passam a opcionais (o formulário público
            // deixou de incluir o sobrenome).
            $table->string('last_name')->nullable()->change();
            $table->text('message')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('contact_leads', function (Blueprint $table) {
            $table->string('last_name')->nullable(false)->change();
            $table->text('message')->nullable(false)->change();
        });
    }
};
