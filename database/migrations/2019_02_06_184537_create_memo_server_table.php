<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo_servers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('memo_id')->unsigned();
            $table->integer('server_id')->unsigned();
            $table->timestamps();


            $table->foreign('memo_id')
            ->references('id')
            ->on('memos')->onDelete('RESTRICT');
            
            $table->foreign('server_id')
            ->references('id')
            ->on('servers')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memo_servers');
    }
}
