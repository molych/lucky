<?php

namespace App\Services\WinningStrategyHandler;

use App\Contracts\WinningStrategy;
use App\Services\WiningStrategy\HighWinStrategy;

class HighStrategyHandler extends WinningStrategyHandler
{
    public function handle(int $number): WinningStrategy
    {
        if ($number > 900) {
            return new HighWinStrategy;
        }

        return parent::handle($number);
    }
}
