<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->string('url', 255);
            $table->string('preview_picture', 255);
            $table->string('preview_picture_description', 255);
            $table->string('detail_picture', 255);
            $table->string('detail_picture_description', 255);
            $table->integer('sort')->default(500);
            $table->boolean('active')->default(false);
            $table->boolean('is_menu')->default(false);
            $table->integer('user_id')->unsigned();
        });

        Schema::table('main', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main', function (Blueprint $table) {
            $table->dropForeign('main_user_id_foreign');
        });

        Schema::drop('main');
    }
}
