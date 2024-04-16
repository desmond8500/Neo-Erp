<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'projet_id',
        'priorite_id',
        'progression_id',
        'titre',
        'description',
        'debut',
        'fin',
        'status',
    ];

    public function taches(): HasMany
    {
        return $this->hasMany(Tache::class);
    }

    // public function responsables(): HasMany
    // {
    //     return $this->hasMany(TacheUser::class);
    // }
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }
    public function livrables(): HasMany
    {
        return $this->hasMany(Livrable::class);
    }

    public function priorite(): HasOne
    {
        return $this->hasOne(Priorite::class);
    }
    public function progression(): HasOne
    {
        return $this->hasOne(Progression::class);
    }
}
