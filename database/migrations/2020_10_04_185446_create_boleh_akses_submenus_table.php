<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBolehAksesSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleh_akses_submenus', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('boleh_akses_submenus');
    }
}
