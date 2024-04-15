<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'projet_id',
        'titre',
        'description',
        'description',
        'progression',
        'priorite',
        'debut',
        'fin',
        'status',
    ];

    public function taches(): HasMany
    {
        return $this->hasMany(Tache::class);
    }

    public function responsables(): HasMany
    {
        return $this->hasMany(TacheUser::class);
    }
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }
    public function livrables(): HasMany
    {
        return $this->hasMany(Livrable::class);
    }
}
