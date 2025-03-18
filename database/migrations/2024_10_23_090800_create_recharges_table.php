<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recharges', function (Blueprint $table) {
            $table->bigIncrements('rechargeid'); 
            $table->string('smartcardno'); 
            $table->unsignedBigInteger('packageid'); 
            $table->date('rechargedate');
            $table->date('packageduedate');
            $table->string('packagestatus');
            $table->decimal('amount', 8, 2);
            $table->foreign('smartcardno')->references('smartcardno')->on('customers')->onDelete('cascade');
            $table->foreign('packageid')->references('packageid')->on('packages')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recharges');
    }
};
