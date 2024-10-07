<?php

use App\Services\WinningStrategyFactory;

it('calculates the win amount correctly for random number greater than 900', function () {
    $strategyFactory = new WinningStrategyFactory();
    $strategy = $strategyFactory::getStrategy(950);
    $winAmount = $strategy->calculateWinAmount(950);
    expect($winAmount)->toBe((int) floor(950 * 0.7));
});

it('calculates the win amount correctly for random number greater than 600 but less than or equal 900', function () {
    $strategyFactory = new WinningStrategyFactory();
    $strategy = $strategyFactory::getStrategy(700);
    $winAmount = $strategy->calculateWinAmount(700);
    expect($winAmount)->toBe((int) floor(700 * 0.5));
});

it('calculates the win amount correctly for random number greater than 300 but less than or equal 600', function () {
    $strategyFactory = new WinningStrategyFactory();
    $strategy = $strategyFactory::getStrategy(400);
    $winAmount = $strategy->calculateWinAmount(400);
    expect($winAmount)->toBe((int) floor(400 * 0.3));
});

it('calculates the win amount correctly for random number less than or equal 300', function () {
    $strategyFactory = new WinningStrategyFactory();
    $strategy = $strategyFactory::getStrategy(200);
    $winAmount = $strategy->calculateWinAmount(200);
    expect($winAmount)->toBe((int) floor(200 * 0.1));
});
