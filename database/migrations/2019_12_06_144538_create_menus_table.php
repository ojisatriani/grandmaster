<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('menus');
            $table->string('kode', 50)->unique();
            $table->string('nama');
            $table->string('link');
            $table->string('icon');
            $table->boolean('tampilkan')->default(1);
            $table->boolean('private')->default(1);
            $table->boolean('perbaikan')->default(0);
            $table->text('pengumuman')->nullable();
            $table->smallInteger('nomor_urut')->default(0);
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
        Schema::dropIfExists('menus');
    }
}
