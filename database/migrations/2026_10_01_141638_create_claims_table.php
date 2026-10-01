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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete();
            $table->string('claimant_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable(); // officer needs to always try the number to ensure its not a fake phone number
            $table->string('nim')->nullable();
            $table->timestamp('claimed_at')->useCurrent();
            $table->foreignId('officer_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
