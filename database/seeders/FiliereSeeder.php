<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filiere;

class FiliereSeeder extends Seeder
{
    public function run(): void
    {
        Filiere::updateOrCreate(
            ['nom' => 'Développement Web'],
            [
                'description' => 'Formation en développement web',
                'duree' => '12 mois',
            ]
        );

        Filiere::updateOrCreate(
            ['nom' => 'Réseaux Informatiques'],
            [
                'description' => 'Formation en réseaux informatiques',
                'duree' => '10 mois',
            ]
        );

        Filiere::updateOrCreate(
            ['nom' => 'Bureautique'],
            [
                'description' => 'Formation en bureautique',
                'duree' => '6 mois',
            ]
        );
    }
}