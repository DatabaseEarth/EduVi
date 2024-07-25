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
        Schema::create('product', function (Blueprint $table) {
            $table->id('Id_Product');
            $table->string('Name');
            $table->decimal('Price', 11, 2);;
            $table->string('Image', 250);
            $table->text('Describe');
            $table->integer('Hide')->default(1);
            $table->integer('View')->default(1);
            $table->integer('Hot')->default(0);
            $table->integer('Quantity')->default(1);
            $table->unsignedBigInteger('Id_Category');
            $table->foreign('Id_Category')->references('Id_Category')->on('category')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('product');
    }
};
