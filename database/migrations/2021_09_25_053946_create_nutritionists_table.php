<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritionists', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('photo');
            $table->text('experience');
            $table->text('rate_chart');
            $table->bigInteger('Accountno');
            $table->string('ifsc_code');
            $table->string('bank_name');
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
        Schema::dropIfExists('nutritionists');
    }
}
