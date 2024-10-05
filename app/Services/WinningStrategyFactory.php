<?php

namespace App\Services;

use App\Contracts\WinningStrategy;
use App\Services\WinningStrategyHandler\HighStrategyHandler;
use App\Services\WinningStrategyHandler\LowStrategyHandler;
use App\Services\WinningStrategyHandler\MidStrategyHandler;
use App\Services\WinningStrategyHandler\MinStrategyHandler;

class WinningStrategyFactory
{
    public static function getStrategy(int $number): WinningStrategy
    {
        $highHandler = new HighStrategyHandler;
        $midHandler = new MidStrategyHandler;
        $lowHandler = new LowStrategyHandler;
        $minHandler = new MinStrategyHandler;

        $highHandler
            ->setNext($midHandler)
            ->setNext($lowHandler)
            ->setNext($minHandler);

        return $highHandler->handle($number);
    }
}
