<?php

namespace App\Services;

class ResultCheckerService
{
    /**
     * @param int $number
     * @return bool
     */
    public function determineResult(int $number): bool
    {
        return ($number % 2 === 0);
    }
}
