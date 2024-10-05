<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class History extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'random_number',
        'result',
        'win_amount',
    ];


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get user histories based on the count and show-history parameter.
     *
     * @param Request $request
     * @param int $count
     * @return Collection
     */
    public static function getUserHistories(Request $request, int $count): Collection
    {
        return Arr::get($request->all(), 'show-history') ?
            $request->user()->histories()->latest()->take($count)->get() :
            new Collection();
    }
}
