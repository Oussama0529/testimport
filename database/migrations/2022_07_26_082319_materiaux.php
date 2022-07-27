<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiaux', function (Blueprint $table) {
            $table->increments('ref');
            $table->string('detail_dechaet');
            $table->float('masse_volumique',8,2);
            $table->float('longeur',8,2);
            $table->float('largeur',8,2);
            $table->float('epaisseur',8,2);
            $table->float('volume',8,2);
            $table->integer('code_dechet');
            $table->foreignId('id_lot')->references('id_lot')->on('categorie')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('id_niv1')->references('id_niv1')->on('niv1')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materiaux');
    }
};
