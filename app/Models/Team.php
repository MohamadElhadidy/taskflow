<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Team extends Model
{
    protected $fillable = ['name'];


    public function getRouteKeyName()
    {
        return 'identifier'; // ULID or UUID
    }



    protected static function booted()
    {
        static::creating(function ($team) {
            $team->identifier = (string) Str::ulid();
        });
    }

    public function members(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'team_members');
    }

    public function manage()
    {
        $this->members()->attach(auth()->id(), [
            'role' => 'manager'
        ]);
    }
}
