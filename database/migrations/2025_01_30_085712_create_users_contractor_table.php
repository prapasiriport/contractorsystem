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
        // Create users_contractor table
        Schema::create('users_contractor', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->enum('prefix', ['นาย', 'นาง', 'นางสาว'])->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tax_id', 13)->nullable(); // เลขประจำตัวผู้เสียภาษี
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_contractor');
    }
};
