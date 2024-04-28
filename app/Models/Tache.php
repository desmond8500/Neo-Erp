<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'echeance',
        'fin',
        'status',
    ];

    public function projet(): BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }

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
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function priorite(): BelongsTo
    {
        return $this->belongsTo(Priorite::class);
    }
    public function progression(): BelongsTo
    {
        return $this->belongsTo(Progression::class);
    }

}
