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
        Schema::create('facturas', function (Blueprint $table) {
            //
            $table->id('id');
            $table->date('fecha');
            $table->decimal('total', 10, 2);
            $table->string('estado')->default('pendiente'); // Estado de la factura
            $table->string('metodo_pago')->nullable(); // Método de pago
            $table->timestamps();

            //Relaciones
            $table->foreignId('cliente_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
