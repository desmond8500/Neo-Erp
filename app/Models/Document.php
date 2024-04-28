<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'tache_id',
        'name',
        'link',
        'folder',
    ];

    public function tache(): BelongsTo
    {
        return $this->belongsTo(Tache::class);
    }
}
