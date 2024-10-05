<?php

namespace App\Services\WinningStrategyHandler;

use App\Services\WiningStrategy\HighWinStrategy;

class HighStrategyHandler extends WinningStrategyHandler
{
    public function handle(int $number): ?\App\Contracts\WinningStrategy
    {
        if ($number > 900) {
            return new HighWinStrategy();
        }

        return parent::handle($number);
    }
}
