<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('theme_id')->constrained('themes');
            $table->string('api_key');
            $table->string('reference_key');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('entities');
    }
};
