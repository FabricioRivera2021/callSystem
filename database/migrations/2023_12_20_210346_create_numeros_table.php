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
        Schema::create('numeros', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->unsignedBigInteger('customers_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('filas_id');
            $table->unsignedBigInteger('estados_id');
            $table->timestamps();
            $table->foreign('customers_id')->references('id')->on('customers')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('filas_id')->references('id')->on('filas')
            ->onDelete('cascade');
            $table->foreign('estados_id')->references('id')->on('estados')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numeros');
    }
};