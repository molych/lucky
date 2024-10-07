<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * @param Request $request  * @return RedirectResponse
     */
    public function activateLink(Request $request): JsonResponse
    {
        $user = $request->user();
        /** @var string $link */
        $user->regenerateLink();
        return response()->json(['success' => true, 'message' => 'Link has been activated successfully.']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deactivateLink(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->deactivateLink();
        return response()->json(['success' => true, 'message' => 'Link has been deactivated successfully.']);
    }
}
