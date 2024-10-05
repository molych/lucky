<?php

namespace App\Services\WinningStrategyHandler;

use App\Contracts\WinningStrategy;

class WinningStrategyHandler
{
    private $nextHandler;

    public function setNext(WinningStrategyHandler $handler): WinningStrategyHandler
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handle(int $number): ?WinningStrategy
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($number);
        }

        return null;
    }
}
