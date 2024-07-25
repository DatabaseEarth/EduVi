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
        Schema::create('comment_lesson', function (Blueprint $table) {
            $table->id('Id_Comment_Lesson');
            $table->text('Content');
            $table->unsignedBigInteger('Id_User');
            $table->foreign('Id_User')->references('Id_User')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Id_Lesson');
            $table->foreign('Id_Lesson')->references('Id_Lesson')->on('lesson')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comment_lesson');
    }
};
