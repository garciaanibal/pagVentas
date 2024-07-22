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
            $table->id();
            $table->bigInteger('cantidad');
            $table->decimal('precio', 10, 2);
            $table->decimal('subtotal', 10, 2)->computedAs('cantidad * precio'); // Campo calculado
            $table->timestamps();
            //Relaciones
            $table->foreignId('producto_id')->constrained()->onDelete('cascade');
            $table->foreignid('factura_id')->constrained()->onDelete('cascade');
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
