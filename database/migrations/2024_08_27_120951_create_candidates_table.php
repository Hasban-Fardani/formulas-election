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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('vision');
            $table->string('mission');
            $table->foreignId('leader_id')->nullable()->constrained('users');
            $table->foreignId('co_leader_id')->nullable()->constrained('users');
            $table->foreignId('election_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
