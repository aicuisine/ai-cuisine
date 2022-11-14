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
        Schema::create('meal_items', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50)->required();
            
            $table->foreignId('meal_category_id')->onDelete('cascade');
            $table->foreignId('restaurant_id')->onDelete('cascade');
            $table->foreignId('user_id')->onDelete('cascade');

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
        Schema::dropIfExists('meal_items');
    }
};
