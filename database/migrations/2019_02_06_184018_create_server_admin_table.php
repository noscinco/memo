<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerAdminTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('server_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('server_id')->unsigned();
            $table->integer('sector_id')->unsigned();
            $table->timestamps();

            $table->foreign('server_id')
            ->references('id')
            ->on('servers')->onDelete('RESTRICT');
            
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
        Schema::dropIfExists('server_admins');
    }
}
