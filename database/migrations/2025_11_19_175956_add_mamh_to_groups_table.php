<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('groups', function (Blueprint $table) {
        $table->string('maMh');

        $table->foreign('maMh')
              ->references('maMh')
              ->on('subjects')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('groups', function (Blueprint $table) {
        $table->dropForeign(['maMh']);
        $table->dropColumn('maMh');
    });
}

};
