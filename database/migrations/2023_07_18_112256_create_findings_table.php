<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('findings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('latitude');
            $table->text('longitude');
            $table->text('contacts');
            $table->text('username');
            $table->text('media')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('findings');
    }
};
