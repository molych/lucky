<?php

namespace App\Services\WinningStrategyHandler;

use App\Services\WiningStrategy\MinWinStrategy;

class MinStrategyHandler extends WinningStrategyHandler
{
    public function handle(int $number): ?\App\Contracts\WinningStrategy
    {
        return new MinWinStrategy;
    }
}
