<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('title', 100);
            $table->string('sort_title', 50);
            $table->integer('author')->unsigned();
            $table->integer('wartawan')->unsigned();
            $table->longText('description');
            $table->string('sort_description', 255);
            $table->string('image', 100);
            $table->string('thumbnail', 100);
            $table->integer('view')->unsigned();
            $table->boolean('headlines');
            $table->boolean('publish');
            $table->date('publish_at');
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
        Schema::dropIfExists('beritas');
    }
}
