<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterEpisodeTable extends Migration
{
    public function up()
    {
        Schema::create('character_episode', function (Blueprint $table) {
            $table->id();
            $table->foreignId('episode_id')->constrained('episodes')->cascadeOnDelete();
            $table->foreignId('character_id')->constrained('characters')->cascadeOnDelete();
            $table->unique([
                'character_id',
                'episode_id'
            ]);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_episode');
    }
}
