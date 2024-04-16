<?php

namespace App\Models;

use App\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
