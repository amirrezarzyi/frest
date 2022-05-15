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
            $table->string('username')->unique(); //کدملی
            $table->string('first_name')->nullable(); //نام 
            $table->string('last_name')->nullable(); //نام خانوادگی
            $table->string('email')->nullable()->unique(); //ایمیل
            $table->string('mobile')->nullable()->unique(); //تماس
            $table->text('avatar')->nullable(); //تصویر پروفایل
            $table->text('address')->nullable(); //آدرس منزل/دفترکار
            $table->string('slug')->nullable()->unique(); // نامک
            $table->tinyInteger('status')->default(0); //وضعیت
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
