<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = 'characters';

    protected $fillable = [
        'name',
        'dob',
        'occupations',
        'character_avatar',
        'nickname',
        'portrayed',
        'quote_id',
    ];

    protected $casts = [
        'dob' => 'date',
        'occupations' => 'json',
    ];

    public function episodes()
    {
        return $this->belongsToMany(Episode::class, 'character_episode', 'character_id', 'episode_id')->using(CharacterEpisode::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class, 'quote_id');
    }
}
