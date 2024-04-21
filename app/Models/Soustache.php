<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soustache extends Model
{
    use HasFactory;

    protected $fillable = [
        'tache_id',
        'name',
        'description',
        'status_id',
    ];
}
