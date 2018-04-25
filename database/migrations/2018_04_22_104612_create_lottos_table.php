<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLottosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->unsignedSmallInteger('number');
            $table->unsignedInteger('price');
            $table->string('type');
            $table->double('reward', 10, 2)->default(0);
            $table->boolean('is_win')->default(0);
            $table->boolean('get_reward')->default(0);
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
        Schema::dropIfExists('lottos');
    }
}
