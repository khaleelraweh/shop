<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_method_offlines', function (Blueprint $table) {
            $table->id();
            $table->string('method_name'); // bank name
            $table->string('slug')->unique();
            $table->string('method_description'); //description of method name


            $table->string('owner_account_name'); 
            $table->string('owner_account_number'); 
            $table->string('owner_account_country'); 
            $table->string('owner_account_phone'); 

            $table->string('customer_account_name'); 
            $table->string('customer_account_number'); 
            $table->string('customer_account_country'); 
            $table->string('customer_account_phone'); 

            $table->foreignId('payment_category_id')->constrained()->cascadeOnDelete();

            // will be use always
            $table->boolean('status')->default(true);
            $table->dateTime('published_on')->nullable(); 
            $table->string('created_by')->nullable(); 
            $table->string('updated_by')->nullable(); 
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            // end of will be use always

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_method_offlines');
    }
};
