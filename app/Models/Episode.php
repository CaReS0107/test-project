<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';

    protected $fillable = [
        'air_date',
        'title',
        'quote_id'
    ];

    protected $casts = [
        'air_date' => 'date'
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class, 'quote_id');
    }

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_episode', 'episode_id', 'character_id')->using(CharacterEpisode::class);
    }
}
