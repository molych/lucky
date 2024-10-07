<?php

use App\Services\NumberGenerationService;

it('generates a random number within the range 1 to 1000', function () {
    $service = new NumberGenerationService();

    for ($i = 0; $i < 100; $i++) {
        $number = $service->generateRandomNumber();

        expect($number)->toBeInt();
        expect($number)->toBeGreaterThanOrEqual(1);
        expect($number)->toBeLessThanOrEqual(1000);
    }
});
