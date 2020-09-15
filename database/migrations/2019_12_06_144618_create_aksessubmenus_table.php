<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksessubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksessubmenus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('submenu_id')->nullable();
            $table->unsignedInteger('aksesgrup_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('submenu_id')->references('id')->on('submenus')->onDelete('CASCADE');
            $table->foreign('aksesgrup_id')->references('id')->on('aksesgrups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aksessubmenus');
    }
}
