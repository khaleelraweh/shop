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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->string('user_image')->nullable();
            $table->unsignedTinyInteger('status')->default(0); // حالة الحساب محمد او فعال 
            $table->rememberToken();
            $table->boolean('receive_emails')->default(true);

             // will be use always
             $table->string('created_by')->nullable(); 
             $table->string('updated_by')->nullable(); 
             $table->string('deleted_by')->nullable();
             $table->softDeletes();
             // end of will be use always

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
