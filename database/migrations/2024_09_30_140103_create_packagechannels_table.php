<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packagechannels', function (Blueprint $table) {
            $table->bigIncrements('packagechannelid');
            $table->unsignedBigInteger('packageid');
            $table->foreign('packageid')->references('packageid')->on('packages')->onDelete('cascade');
            $table->unsignedBigInteger('channelid');
            $table->foreign('channelid')->references('channelid')->on('channels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packagechannels');
    }
};
