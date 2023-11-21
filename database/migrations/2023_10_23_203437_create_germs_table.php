<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('germs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_isolation_id')->constrained();
            $table->boolean('active')->default(true);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('germs');
    }
};
