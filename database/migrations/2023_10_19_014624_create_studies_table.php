<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->integer('dni');
            $table->string('name');
            $table->string('study');
            $table->date('date');
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->enum('status', ['pendiente', 'informado'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('studies');
    }
};
