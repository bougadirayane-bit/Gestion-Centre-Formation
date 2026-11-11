<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stagiaire;

class StagiaireSeeder extends Seeder
{
    public function run(): void
    {
        Stagiaire::updateOrCreate(
            ['email' => 'ahmed@gmail.com'],
            [
                'nom' => '....',
                'prenom' => 'lkhmj',
                'telephone' => '064rt5678',
                'adresse' => 'Agadir',
                'date_naissance' => '2000-05-15',
            ]
        );

        Stagiaire::updateOrCreate(
            ['email' => 'sara@gmail.com'],
            [
                'nom' => 'dvdbsd',
                'prenom' => 'fdbdd',
                'telephone' => '06234d6436789',
                'adresse' => 'Casa',
                'date_naissance' => '2001-08-20',
            ]
        );

        Stagiaire::updateOrCreate(
            ['email' => 'youssef@gmail.com'],
            [
                'nom' => 'jfdvbf',
                'prenom' => 'Youssef',
                'telephone' => '0634567fd890',
                'adresse' => 'Marra',
                'date_naissance' => '1445-03-10',
            ]
        );
    }
}