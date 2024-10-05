<?php

namespace App\Contracts;
interface WinningStrategy
{
    public function calculateWinAmount(int $number): int;
}
