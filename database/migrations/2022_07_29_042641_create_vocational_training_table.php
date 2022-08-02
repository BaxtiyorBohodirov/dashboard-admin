<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocationalTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocational_training', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('soato_new_id');
            $table->bigInteger('number_centers');
            $table->bigInteger('capacity_centers');
            $table->bigInteger('number_scholarships');
            $table->bigInteger('number_students');
            $table->bigInteger('number_graduates');
            $table->bigInteger('number_dropouts');
            $table->bigInteger('number_employed');
            $table->date('date')->nullable();
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
        Schema::dropIfExists('vocational_training');
    }
}
