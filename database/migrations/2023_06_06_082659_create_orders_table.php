<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->string('date');
            $table->string('time');
            $table->string('phone');
            $table->Integer('meal_id') ;
            $table->integer('small_meal')->default(0);
            $table->integer('medium_meal')->default(0);
            $table->integer('large_meal')->default(0);
            $table->text('body');
            $table->string('status')->default('pending');

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
        Schema::dropIfExists('orders');
    }
};
