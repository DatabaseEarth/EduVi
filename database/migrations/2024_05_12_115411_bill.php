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
        Schema::create('bill', function (Blueprint $table) {
            $table->id('Id_Bill');
            $table->unsignedBigInteger('Id_User')->nullable();
            $table->foreign('Id_User')->references('Id_User')->on('user')->onDelete('set null')->onUpdate('cascade');
            $table->string('Name_Orderer', 250)->nullable();
            $table->string('Email_Orderer', 250)->nullable();
            $table->string('Phone_Orderer', 250)->nullable();
            $table->string('Address_Orderer', 250)->nullable();
            $table->string('Name_recipient', 250)->nullable();
            $table->decimal('Total',11,2)->default(0);
            $table->decimal('Ship',11,2)->default(0);
            $table->string('Voucher', 200)->nullable();
            $table->decimal('Total_Payment',12,2)->default(0);
            $table->set('Status', ['gio-hang', 'thanh-toan', 'chuan-bi', 'dang-giao', 'thanh-cong', 'huy-don'])->default('gio-hang');
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
        Schema::dropIfExists('bill');
    }
};
