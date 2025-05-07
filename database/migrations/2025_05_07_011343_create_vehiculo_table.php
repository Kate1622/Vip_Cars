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
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->id('idvehiculo');
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->string('placa', 20)->unique();
            $table->year('anioFabricacion', 4);
            $table->unsignedBigInteger('idCliente');

            $table->foreign('idCliente')
                ->references('idCliente')
                ->on('cliente')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};
