<?php

use App\Services\ResultCheckerService;

it('determines if a number is even', function () {
    $service = new ResultCheckerService();

    $result = $service->determineResult(4);
    expect($result)->toBeTrue();

    $result = $service->determineResult(5);
    expect($result)->toBeFalse();
});
