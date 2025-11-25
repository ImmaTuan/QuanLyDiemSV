<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign(['maMh']);
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('maMh')
                ->references('maMh')
                ->on('subjects')
                ->onDelete('cascade')
                ->onUpdate('cascade'); 
        });
    }

    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign(['maMh']);
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('maMh')
                ->references('maMh')
                ->on('subjects')
                ->onDelete('cascade');
        });
    }
};
