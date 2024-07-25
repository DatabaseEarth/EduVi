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
        Schema::create('bill_learning', function (Blueprint $table) {
            $table->id('Id_Learning');
            $table->unsignedBigInteger('Id_User');
            $table->foreign('Id_User')->references('Id_User')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Id_course');
            $table->foreign('Id_Course')->references('Id_Course')->on('course')->onDelete('cascade')->onUpdate('cascade');
            $table->set('Status', ['dang-hoc', 'hoan-thanh', 'het-han'])->default('dang-hoc');
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
        Schema::dropIfExists('bill_learning');
    }
};
