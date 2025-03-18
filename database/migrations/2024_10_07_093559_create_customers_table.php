migration customer
 
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customerid'); 
            $table->string('name');
            $table->string('email')->unique(); 
            $table->string('contactno');
            $table->string('aadharno', 12)->unique();
            $table->boolean('status')->default(1); 
            $table->string('username')->unique(); 
            $table->string('password'); 
            $table->string('smartcardno')->unique(); 
            $table->date('enddate')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers'); 
    }
};
