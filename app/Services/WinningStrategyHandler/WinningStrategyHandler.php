<?php

namespace App\Services\WinningStrategyHandler;

use App\Contracts\WinningStrategy;

class WinningStrategyHandler
{
    private WinningStrategyHandler $nextHandler;

    public function setNext(WinningStrategyHandler $handler): WinningStrategyHandler
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handle(int $number): WinningStrategy
    {
        return $this->nextHandler->handle($number);

    }
}
