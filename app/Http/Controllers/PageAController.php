<?php

namespace App\Http\Controllers;

use App\Helpers\ConfigValidator;
use App\Http\Resources\HistoryResource;
use App\Models\History;
use App\Models\User;
use App\Services\NumberGenerationService;
use App\Services\ResultCheckerService;
use App\Services\WinningStrategyFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;

class PageAController extends Controller
{
    protected NumberGenerationService $numberService;

    protected ResultCheckerService $resultChecker;

    private WinningStrategyFactory $strategyFactory;

    public function __construct(
        NumberGenerationService $numberService,
        ResultCheckerService $resultChecker,
        WinningStrategyFactory $strategyFactory)
    {
        $this->strategyFactory = $strategyFactory;
        $this->numberService = $numberService;
        $this->resultChecker = $resultChecker;
    }

    public function index(Request $request): Response
    {
        return Inertia::render('PageA', [
            'histories' => HistoryResource::collection(
                History::getUserHistories($request, ConfigValidator::getValidatedHistoryCount()))
                ->resolve(),
        ]);
    }

    public function imFeelingLucky(Request $request): JsonResponse
    {
        $randomNumber = $this->numberService->generateRandomNumber();
        $result = $this->resultChecker->determineResult($randomNumber);
        $strategy = $this->strategyFactory::getStrategy($randomNumber);
        $winAmount = $strategy->calculateWinAmount($randomNumber);

        /** @var User $user */
        $user = $request->user();
        $history = $user->histories()->create([
            'random_number' => $randomNumber,
            'result' => $result,
            'win_amount' => $result ? $winAmount : 0,
        ]);

        return response()->json([
            'history' => HistoryResource::make($history),
            'histories' => HistoryResource::collection(
                History::getUserHistories($request, ConfigValidator::getValidatedHistoryCount()))
                ->resolve(),
        ]);
    }
}
