<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurbstonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curbstones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->string('keywords', 255);
            $table->string('slug', 255)->unique();
            $table->text('preview_text');
            $table->text('detail_text');
            $table->text('property');
            $table->boolean('is_main')->default(false);
            $table->string('image_passport', 255);
            $table->string('image_passport_description', 255);
            $table->string('image_list', 255);
            $table->string('image_list_description', 255);
            $table->string('image_passport_left', 255);
            $table->string('image_passport_left_description', 255);
            $table->string('image_passport_right', 255);
            $table->string('image_passport_right_description', 255);
            $table->text('slider_input');
            $table->integer('sort')->default(500);
            $table->boolean('active')->default(false);
            $table->boolean('is_menu')->default(false);
            $table->integer('user_id')->unsigned();
        });

        Schema::table('curbstones', function (Blueprint $table) {
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
        Schema::table('curbstones', function (Blueprint $table) {
            $table->dropForeign('curbstones_user_id_foreign');
        });

        Schema::drop('curbstones');
    }
}
