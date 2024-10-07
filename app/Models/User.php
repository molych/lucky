<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @return HasMany<History>
     */
    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }

    /**
     * @return HasOne<Link>
     */
    public function link(): HasOne
    {
        return $this->hasOne(Link::class);
    }

    /**
     * @return mixed
     */
    public function regenerateLink(): mixed
    {
        $this->link()->delete();
        $link = $this->link()->create([
            'link' => Str::uuid(),
            'expired_at' => now()->addDays(7),
        ]);
        return $link->link;
    }

    /**
     * @return void
     */
    public function deactivateLink(): void
    {
        $this->link()->delete();
    }
}
