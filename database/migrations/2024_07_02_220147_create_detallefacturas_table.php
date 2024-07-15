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
        Schema::create('detallefacturas', function (Blueprint $table) {
            //Columnas
            $table->id('id');
            $table->bigInteger('cantidad');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_factura');
            $table->decimal('precio', 10, 2);
            $table->decimal('subtotal', 10, 2)->computedAs('cantidad * precio'); // Campo calculado opcional
            $table->timestamps();
            
            //Relaciones
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_factura')->references('id')->on('facturas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallefacturas');
    }
};
