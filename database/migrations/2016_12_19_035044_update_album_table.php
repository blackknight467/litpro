<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->date('recorded_date')->nullable()->change();
            $table->date('release_date')->nullable()->change();
            $table->integer('number_of_tracks')->nullable()->change(); //this needs to be integer instead of medium int because of https://github.com/laravel/framework/issues/8840
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->date('recorded_date')->change();
            $table->date('release_date')->change();
            $table->integer('number_of_tracks')->change(); //this needs to be integer instead of medium int because of https://github.com/laravel/framework/issues/8840
        });
    }
}
