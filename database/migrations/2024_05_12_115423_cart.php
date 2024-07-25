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
        Schema::create('cart', function (Blueprint $table) {
            $table->id('Id_Cart');
            $table->unsignedBigInteger('Id_Product')->nullable();
            $table->foreign('Id_Product')->references('Id_Product')->on('product')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('Id_Bill');
            $table->foreign('Id_Bill')->references('Id_Bill')->on('bill')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('Price_Product',11,2);
            $table->string('Name_Product', 250);
            $table->string('Image_Product', 250);
            $table->integer('Quantity')->default(1);
            $table->decimal('Total',11,2)->default(0);
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
