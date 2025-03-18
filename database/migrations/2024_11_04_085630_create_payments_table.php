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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('paymentid');  
            $table->unsignedBigInteger('rechargeid'); 
            $table->date('paydate');
            $table->decimal('amount', 8, 2);
            $table->string('status');
            $table->timestamps();
            $table->foreign('rechargeid')->references('rechargeid')->on('recharges')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
