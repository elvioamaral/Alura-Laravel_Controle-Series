<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number'];


    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function nmberOfWatchedEpisodes(): int
    {
        return $this->episodes
            ->filter(fn ($episode) => $episode->watched)
            ->count();
    }
}
