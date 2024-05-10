<?php

namespace App\Models;

use App\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Client extends Model
{
    use HasFactory;
    use SearchTrait;

    protected $fillable = [
        'name',
        'description',
        'status',
        'logo',
        'type',
        'adresse',
    ];

    public function projets(): HasMany
    {
        return $this->hasMany(Projet::class);
    }

    /**
     * Get all of the taches for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function taches(): HasManyThrough
    {
        return $this->hasManyThrough(Tache::class, Projet::class);
    }
}
