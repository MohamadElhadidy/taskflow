<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        return $this->BelongsToMany(User::class, 'team_members')->withPivot('role');
    }

    public function invitations()
    {
        return $this->hasMany(TeamInvitation::class);
    }

    public function boards(): HasMany
    {
        return $this->hasMany(Board::class);
    }

    public function addManager(User $user = null): void
    {
        $user = $user ?? auth()->user();

        $this->members()->syncWithoutDetaching([
            $user->id => ['role' => 'manager'],
        ]);
    }

    public function addMember(User $user = null): void
    {
        $user = $user ?? auth()->user();

        $this->members()->syncWithoutDetaching([
            $user->id => ['role' => 'member'],
        ]);
    }

    public function invite($email): TeamInvitation
    {
        return $this->invitations()->create([
            'email' => $email
        ]);
    }

    public function isManager(User $user = null): bool
    {
        $user = $user ?? auth()->user();

        return $this->members()
            ->where('user_id', $user->id)
            ->wherePivot('role', 'manager')
            ->exists();
    }


    public function isMember(User $user = null): bool
    {
        $user = $user ?? auth()->user();

        return $this->members()
            ->where('user_id', $user->id)
            ->wherePivot('role', 'member')
            ->exists();
    }


    public function activeInvitations()
    {
        return $this->invitations()->whereNull('accepted_at');
    }

}
