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
        Progression::create(['name'=> 'Non Démarrée', 'color'=>'blue']);
        Progression::create(['name'=> 'En Cours', 'color'=>'orange']);
        Progression::create(['name'=> 'Terminée', 'color'=>'green']);
        Progression::create(['name'=> 'En Attente', 'color'=>'grey']);
        Progression::create(['name'=> 'En Retard', 'color'=>'red']);

        // Priorite
        Priorite::create(['name'=>'Faible', 'color'=>'blue']);
        Priorite::create(['name'=> 'Moyenne', 'color'=>'orange']);
        Priorite::create(['name'=> 'Haute', 'color'=>'red']);
    }
}
