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
        Schema::create('user', function (Blueprint $table) {
            $table->id('Id_User');
            $table->string('FullName', 250);
            $table->string('Email', 100)->unique();
            $table->text('Password');
            $table->text('Token')->nullable();
            $table->string('Phone',12)->nullable();
            $table->text('Address',12)->nullable();
            $table->integer('Role')->default(0);
            $table->string('Avatar', 250);
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
        Schema::dropIfExists('user');
    }
};
