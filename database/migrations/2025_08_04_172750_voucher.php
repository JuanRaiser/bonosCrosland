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
        Schema::create('voucher', function (blueprint $table) {
            $table->id('id_voucher');
            $table->decimal('precio_final', 8, 2);
            $table->timestamps();

            $table->foreignId('id_cliente')->references('id_cliente')->on('cliente')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('voucher');
    }
};
