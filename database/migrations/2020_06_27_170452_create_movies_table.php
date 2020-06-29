<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('key', 30);
            $table->string('title', 60);
            $table->string('type', 20);
            $table->string('release_year', 5);
            $table->text('img_url');
            $table->integer('movie_detail_id')->unsigned();
            $table->timestamps();

            $table->increments('id');
            $table->foreign('movie_detail_id')
                    ->references('id')->on('movie_details')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
