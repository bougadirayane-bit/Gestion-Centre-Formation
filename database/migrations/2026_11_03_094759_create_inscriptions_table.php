<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('stagiaire_id')
                ->constrained('stagiaires')
                ->cascadeOnDelete();

            $table->foreignId('filiere_id')
                ->constrained('filieres')
                ->cascadeOnDelete();

            $table->date('date_inscription');
            $table->enum('statut', [
                'en_attente',
                'acceptee',
                'refusee'
            ])->default('en_attente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
