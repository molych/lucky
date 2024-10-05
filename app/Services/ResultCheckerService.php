<?php

namespace App\Services;

class ResultCheckerService
{
    public function determineResult(int $number): bool
    {
        return $number % 2 === 0;
    }
}
