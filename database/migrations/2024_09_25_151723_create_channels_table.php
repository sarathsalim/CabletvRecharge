<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->bigIncrements('channelid'); 
            $table->string('channelname');
            $table->string('language');
            $table->text('description')->nullable();
            $table->timestamps(); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};