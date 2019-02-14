<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporaryInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('server_id')->unsigned();;
            $table->timestamps();
            $table->string('name',100);
            $table->string('cpf',11)->unique();
            $table->string('siape_code',20)->unique();
            $table->integer('office_id')->unsigned();
            $table->integer('sector_id')->unsigned();
           

            $table->foreign('server_id')
            ->references('id')
            ->on('servers')
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
        Schema::dropIfExists('temporary_infos');
    }
}
