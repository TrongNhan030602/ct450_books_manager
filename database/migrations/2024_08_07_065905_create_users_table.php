<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('dob');
            $table->string('address', 255);
            $table->string('phone', 15);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->enum('role', ['reader', 'staff', 'admin']);
            $table->enum('membership_level', ['Silver', 'Gold', 'Platinum'])->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};