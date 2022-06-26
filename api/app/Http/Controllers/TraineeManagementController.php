<?php

namespace App\Http\Controllers;

use App\Enums\UserPermission;
use App\Services\TraineeManagementService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class TraineeManagementController extends Controller
{
    public function __construct(
        private readonly TraineeManagementService $traineeManagementService
    ) {
        $authorizations = [
            'can:' . UserPermission::TRAINEE_MANAGEMENT->value
        ];
        $this->middleware($authorizations);
    }

    public function index(): JsonResponse
    {
        $response = $this->traineeManagementService->getAllTrainees();
        return response()->json($response, ResponseConstant::HTTP_OK);
    }
}
