<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Board extends Model
{
    protected $fillable = ['name', 'color', 'team_id', 'order'];


    protected static function booted()
    {
        static::creating(function ($board) {
            $count = $board->team->boards()->count();
            $board->order = $count + 1;
        });
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
