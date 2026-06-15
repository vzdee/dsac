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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('rfc', 13)->unique()->nullable();
            $table->string('curp', 18)->unique()->nullable();
            $table->string('social_reason', 255)->nullable();
            $table->string('fiscal_regime', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('postal_code', 5)->nullable();
            $table->string('municipality', 50)->nullable();
            $table->string('state', 25)->nullable();
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
