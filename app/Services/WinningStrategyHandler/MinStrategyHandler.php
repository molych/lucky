<?php

namespace App\Services\WinningStrategyHandler;

use App\Contracts\WinningStrategy;
use App\Services\WiningStrategy\MinWinStrategy;

class MinStrategyHandler extends WinningStrategyHandler
{
    public function handle(int $number): WinningStrategy
    {
        return new MinWinStrategy;
    }
}
