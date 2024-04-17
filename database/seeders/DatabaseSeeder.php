<?php

namespace Database\Seeders;

use App\Models\Priorite;
use App\Models\Progression;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'prenom' => 'admin',
            'nom' => 'admin',
            'email' => 'admin@admin.com',
            'fonction' => 'Administrateur',
            'password' => Hash::make('passer1234'),
        ]);

        // Progression
        Progression::create(['name'=> 'Non Démarrée']);
        Progression::create(['name'=> 'En Cours']);
        Progression::create(['name'=> 'Terminée']);
        Progression::create(['name'=> 'En Attente']);
        Progression::create(['name'=> 'En Retard']);

        // Priorite
        Priorite::create(['name'=>'Faible']);
        Priorite::create(['name'=> 'Moyenne']);
        Priorite::create(['name'=> 'Haute']);
    }
}
