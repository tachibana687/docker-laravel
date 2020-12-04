<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldVotingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_votings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag1_id')->constrained('tags')->onDelete('cascade');
            $table->foreignId('tag2_id')->constrained('tags')->onDelete('cascade');
            $table->integer('tag1_num');
            $table->integer('tag2_num');
            $table->foreignId('creature_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('old_votings');
    }
}
