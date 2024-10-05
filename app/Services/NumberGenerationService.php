<?php

namespace App\Services;

class NumberGenerationService
{
    /***
     * @return int
     */
    public function generateRandomNumber(): int
    {
        return rand(1, 1000);
    }
}
