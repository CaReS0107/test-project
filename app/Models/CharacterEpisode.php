<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacterEpisode extends Pivot
{
    use HasFactory;

    protected $table = 'character_episode';

    protected $fillable = [
        'episode_id',
        'character_id'
    ];

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class, 'character_id');
    }

    public function episod(): BelongsTo
    {
        return $this->belongsTo(Episode::class, 'episode_id');
    }
}
