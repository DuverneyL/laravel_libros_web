<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //se crea este esquema aqui porque es necesario cuando se crea la foranea de Libros
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();
        });


        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->mediumText('descripcion');
            $table->text('contenido');
            $table->timestamp('fecha')->nullable();
            $table->unsignedBigInteger('categoria_id'); // Relación con categorias
            $table->foreign('categoria_id')->references('id')->on('categorias'); // clave foranea
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
        Schema::dropIfExists('libros');
        Schema::dropIfExists('categorias');
    }
}
