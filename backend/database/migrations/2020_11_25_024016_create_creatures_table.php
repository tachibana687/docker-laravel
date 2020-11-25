<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creatures', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->string('found_place');
            $table->string('detail');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('voting_id')->constrained()->onDelete('cascade');
            $table->integer('bookmark');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('creatures');
    }
}
