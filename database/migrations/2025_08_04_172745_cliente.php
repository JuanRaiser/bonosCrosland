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
        Schema::create('cliente', function (blueprint $table) {
            $table->id('id_cliente');//DNI
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('cupon');
            
            $table->foreignId('id_moto')->references('id_moto')->on('moto')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
