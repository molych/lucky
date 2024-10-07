<?php

namespace App\Services\WinningStrategyHandler;

use App\Contracts\WinningStrategy;
use App\Services\WiningStrategy\MidWinStrategy;

class MidStrategyHandler extends WinningStrategyHandler
{
    public function handle(int $number): WinningStrategy
    {
        if ($number > 600) {
            return new MidWinStrategy;
        }

        return parent::handle($number);
    }
}
