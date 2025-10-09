<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;



class TeamInvitation extends Model
{

    protected $fillable = ['team_id', 'email', 'token', 'expires_at', 'accepted_at'];

    protected static function booted()
    {
        static::creating(function ($invite) {
            $invite->token = (string) Str::ulid();
            $invite->expires_at = now()->addDays(3);
        });
    }

    public function scopeActive($query)
    {
        return $query->where('expires_at', '>=', now());
    }


    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function isExpired(): bool
    {
        return $this->expires_at && now()->isAfter($this->expires_at);
    }

 

}