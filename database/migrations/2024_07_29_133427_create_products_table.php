<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('short_description');
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->default(0);
            $table->boolean('in_stock')->default(true);
            $table->decimal('weight', 8, 2);
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
