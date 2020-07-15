<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('phone');
            $table->string('address');
            $table->string('location');
            $table->string('email');
            $table->string('logo_icon');
            $table->string('link_facebook');
            $table->string('link_twitter');
            $table->string('link_instagram');
            $table->string('link_vimeo');
            $table->text('more_info');
            $table->string('header_bg');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
