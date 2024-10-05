<?php

namespace App\Services\WiningStrategy;

use App\Contracts\WinningStrategy;

class LowWinStrategy implements WinningStrategy
{
    public function calculateWinAmount(int $number): int
    {
        return (int) floor($number * 0.3);
    }
}
