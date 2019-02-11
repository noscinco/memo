<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->string('name',100);
            $table->string('cpf',11)->unique();
            $table->string('siape_code',20)->unique();
            $table->integer('office_id')->unsigned();
            $table->integer('sector_id')->unsigned();
            $table->string('initials_code',5)->unique();
            $table->integer('number_memo')->unsigned();
           

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('RESTRICT');
            
            $table->foreign('office_id')
            ->references('id')
            ->on('offices')
            ->onDelete('RESTRICT');            

            $table->foreign('sector_id')
            ->references('id')
            ->on('sectors')
            ->onDelete('RESTRICT');
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
}
