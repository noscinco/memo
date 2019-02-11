<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerRecipientTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('server_recipients', function (Blueprint $table) {
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
        Schema::dropIfExists('server_recipients');
    }
}
