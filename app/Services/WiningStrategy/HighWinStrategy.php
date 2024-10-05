<?php

namespace App\Services\WiningStrategy;

use App\Contracts\WinningStrategy;

class HighWinStrategy implements WinningStrategy
{
    public function calculateWinAmount(int $number): int
    {
        return (int) floor($number * 0.7);
    }
}
