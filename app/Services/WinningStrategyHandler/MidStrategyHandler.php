<?php

namespace App\Services\WinningStrategyHandler;

use App\Services\WiningStrategy\MidWinStrategy;

class MidStrategyHandler extends WinningStrategyHandler
{
    public function handle(int $number): ?\App\Contracts\WinningStrategy
    {
        if ($number > 600) {
            return new MidWinStrategy;
        }

        return parent::handle($number);
    }
}
