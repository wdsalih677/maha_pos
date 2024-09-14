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
        Schema::create('product_sele', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sele_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->foreign('sele_id')->references('id')->on('seles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sele');
    }
};
