<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->string('kode', 50)->unique();
            $table->string('nama');
            $table->string('link');
            $table->string('icon');
            $table->boolean('status')->default(1);
            $table->boolean('tampil')->default(1);
            $table->boolean('perbaikan')->default(0);
            $table->text('pengumuman')->nullable();
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
        Schema::dropIfExists('submenus');
    }
}
