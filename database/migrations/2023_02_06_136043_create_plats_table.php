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
        //
        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('name');
            $table->string('discretion');
            $table->float('price');
            $table->unsignedBigInteger("meal_category_id");
            $table->unsignedBigInteger("user_id");

            $table->foreign("meal_category_id")->references('id')->on('meal_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId("user_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('meal_category_id')->references('id')->on('meal_categories')->onDelete('cascade')->onUpdate('cascade');
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
        //
    }
};
