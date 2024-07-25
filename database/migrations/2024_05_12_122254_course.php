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
        Schema::create('course', function (Blueprint $table) {
            $table->id('Id_Course');
            $table->string('Title', 250);
            $table->text('Describe');
            $table->decimal('Price',11,2)->default(0);
            $table->string('Image', 250);
            $table->integer('Hide')->default(1);
            $table->integer('View')->default(1);
            $table->string('Request', 500);
            $table->string('Achievement', 500);
            $table->text('Video_Intro');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->integer('pro')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
