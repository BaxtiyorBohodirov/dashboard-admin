<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('soato_new_id')->unsigned()->index()->nullable();
            $table->foreign('soato_new_id')->references('id')->on('soato_new')->onDelete('cascade');
            $table->bigInteger('total_employees');
            $table->bigInteger('active_population');
            $table->bigInteger('employees');
            $table->bigInteger('average_populartion');
            $table->bigInteger('unemployed');
            $table->float('rate_unemployement',15,4);
            $table->bigInteger('unactive_population');
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
        Schema::dropIfExists('resources');
    }
}
