<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Link extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'link',
        'expired_at',
    ];

    /**
     * @return BelongsTo<User, History>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param Request $request
     * @param int $count
     * @return Collection<int,History>
     */
    public static function getUserHistories(Request $request, int $count): Collection
    {
        /** @var User $user */
        $user = $request->user();

        return $request->input('show-history') ?
            $user->histories()->latest()->take($count)->get() :
            new Collection();
    }
}
