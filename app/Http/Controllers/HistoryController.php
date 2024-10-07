<?php

namespace App\Http\Controllers;

use App\Helpers\ConfigValidator;
use App\Http\Resources\HistoryResource;
use App\Models\History;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'histories' => HistoryResource::collection(
                History::getUserHistories($request, ConfigValidator::getValidatedHistoryCount()))
                ->resolve(),
        ]);
    }
}
