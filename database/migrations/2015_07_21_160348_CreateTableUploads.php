<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUploads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mime_type');
            $table->string('file_uri');
            $table->integer('chops_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('chops_id')
                    ->references('id')
                    ->on('chops');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('uploads');
    }
}
