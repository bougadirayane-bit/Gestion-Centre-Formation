<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscription;
use App\Models\Stagiaire;
use App\Models\Filiere;

class InscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $stagiaire = Stagiaire::where('email', 'ahmed@gmail.com')->first();
        $filiere = Filiere::where('nom', 'Développement Web')->first();

        if ($stagiaire && $filiere) {
            Inscription::updateOrCreate(
                [
                    'stagiaire_id' => $stagiaire->id,
                    'filiere_id' => $filiere->id,
                ],
                [
                    'date_inscription' => now()->toDateString(),
                    'statut' => 'acceptee',
                ]
            );
        }
    }
}