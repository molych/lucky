<?php

namespace App\Services\WinningStrategyHandler;

use App\Services\WiningStrategy\LowWinStrategy;

class LowStrategyHandler extends WinningStrategyHandler
{
    public function handle(int $number): ?\App\Contracts\WinningStrategy
    {
        if ($number > 300) {
            return new LowWinStrategy();
        }

        return parent::handle($number);
    }
}
