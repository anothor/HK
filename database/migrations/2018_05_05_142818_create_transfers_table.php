<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('type');
            $table->string('user_id');
            $table->string('bank');
            $table->double('money', 10, 2)->default(0);
            $table->string('slip')->nullable();
            $table->string('admin_id')->nullable();            
            $table->string('status')->default('pending');         
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
        Schema::dropIfExists('transfers');
    }
}
