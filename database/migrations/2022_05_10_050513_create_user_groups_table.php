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
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //عنوان
            $table->text('description')->nullable(); //توضیحات
            $table->text('avatar')->nullable(); //تصویر گروه
            $table->string('slug')->nullable()->unique(); // نامک 
            $table->tinyInteger('status')->default(0); //وضعیت 
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
        Schema::dropIfExists('user_groups');
    }
};
