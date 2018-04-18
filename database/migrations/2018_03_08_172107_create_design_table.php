<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->string('keywords', 255);
            $table->string('slug', 255)->unique();
            $table->string('name', 255);
            $table->string('slogan', 255);
            $table->string('preview_picture', 255);
            $table->string('preview_picture_description', 255);
            $table->string('detail_picture', 255);
            $table->string('detail_picture_description', 255);
            $table->integer('sort')->default(500);
            $table->boolean('active')->default(false);
            $table->boolean('is_menu')->default(false);
            $table->integer('user_id')->unsigned();
        });

        Schema::table('design', function (Blueprint $table) {
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
        Schema::table('design', function (Blueprint $table) {
            $table->dropForeign('design_user_id_foreign');
        });

        Schema::drop('design');
    }
}
