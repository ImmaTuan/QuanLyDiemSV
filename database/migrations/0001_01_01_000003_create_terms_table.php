<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->integer('year'); 
            $table->enum('semester', [1, 2]); 
            $table->timestamps();
        });
    }
   


    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};

