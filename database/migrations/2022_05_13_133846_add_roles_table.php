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
        Schema::table('roles', function (Blueprint $table) { 
            $table->foreignId('parent_id')->after('name')->nullable()->constrained('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title')->after('parent_id')->unique()->nullable();  
            $table->foreignId('system_id')->after('title')->nullable()->constrained('sub_systems')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
};
