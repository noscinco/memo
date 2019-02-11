<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorRecipientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('memo_id')->unsigned();
            $table->integer('sector_id')->unsigned();
            $table->timestamps();


            $table->foreign('memo_id')
            ->references('id')
            ->on('memos')->onDelete('RESTRICT');
            
            $table->foreign('sector_id')
            ->references('id')
            ->on('sectors')->onDelete('RESTRICT');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sector_recipients');
    }
}
