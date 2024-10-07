<?php

namespace App\Http\Resources;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin History */
class HistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var History $history */
        $history = $this->resource;

        return [
            'id' => $history->id,
            'random_number' => $history->random_number,
            'win_amount' => $history->win_amount,
            'result' => $history->result,
        ];
    }
}
