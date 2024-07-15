<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {

            //Creacion de columnas
            $table->id('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('id_categoria');
            $table->decimal('precio_costo', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->string('codigo_barra',50)->unique();;
            $table->bigInteger('stock')->default(0);
            $table->timestamps();
            
            //Relaciones
            $table->foreign('id_categoria')->references('id')->on('categorias');

            


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
