<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoatoNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soato_new', function (Blueprint $table) {
            $table->id();
            $table->integer('soato');
            $table->string('name_uz_ln');
            $table->string('center_uz_ln');
            $table->string('name_uz_cl');
            $table->string('center_uz_cl');
            $table->string('name_ru');
            $table->string('center_ru');
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
        Schema::dropIfExists('soato_new');
    }
}
