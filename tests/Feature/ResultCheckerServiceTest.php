<?php

use App\Services\ResultCheckerService;

it('determines if a number is even', function () {
    $service = new ResultCheckerService();

    $result = $service->determineResult(4);
    expect($result)->toBeTrue();

    $result = $service->determineResult(5);
    expect($result)->toBeFalse();
});

it('determines if zero is considered even', function () {
    $service = new ResultCheckerService();
    $result = $service->determineResult(0);
    expect($result)->toBeTrue();
});

it('determines if a negative even number is considered even', function () {
    $service = new ResultCheckerService();
    $result = $service->determineResult(-2);
    expect($result)->toBeTrue();
});

it('determines if a negative odd number is considered odd', function () {
    $service = new ResultCheckerService();
    $result = $service->determineResult(-3);
    expect($result)->toBeFalse();
});
