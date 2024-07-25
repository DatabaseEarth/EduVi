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
        Schema::create('lesson', function (Blueprint $table) {
            $table->id('Id_Lesson');
            $table->string('Title', 250);
            $table->unsignedBigInteger('Id_Chapter');
            $table->foreign('Id_Chapter')->references('Id_Chapter')->on('chapter')->onDelete('cascade')->onUpdate('cascade');
            $table->text('Describe');
            $table->text('Video_Lesson');
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
        Schema::dropIfExists('lesson');
    }
};
