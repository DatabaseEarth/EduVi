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
        Schema::create('chapter', function (Blueprint $table) {
            $table->id('Id_Chapter');
            $table->string('Title', 250);
            $table->unsignedBigInteger('Id_Course');
            $table->foreign('Id_Course')->references('Id_Course')->on('course')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('STT')->default(1);
            $table->integer('Hide')->default(1);
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
        Schema::dropIfExists('chapter');
    }
};
