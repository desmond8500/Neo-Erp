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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->integer('projet_id')->constrained();
            $table->integer('priorite_id')->constrained();
            $table->integer('progression_id')->constrained();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->date('debut')->nullable();
            $table->date('echeance')->nullable();
            $table->date('fin')->nullable();
            $table->boolean('statut')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
