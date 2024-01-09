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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('numeros_id')->nullable();
            $table->unsignedBigInteger('filas_id');
            $table->string('name');
            $table->integer('ci');
            $table->timestamps();
            $table->foreign('numeros_id')->references('id')->on('numeros')
            ->onDelete('cascade');
            $table->foreign('filas_id')->references('id')->on('filas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
