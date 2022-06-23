<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\TraineeRegistrationRequest;
use App\Services\TraineeRegistrationService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class AuthController extends Controller
{
    public function __construct(
        private readonly TraineeRegistrationService $traineeRegistration
    )
    {
    }

    public function register(TraineeRegistrationRequest $request): JsonResponse
    {
        $newTrainee = $this->traineeRegistration->createUser($request->all());
        if ($newTrainee) {
            $token = $newTrainee->createToken('AccessAuthToken')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Trainee Successfully Registered',
                'auth_token' => $token,
                'user' => $newTrainee
            ], ResponseConstant::HTTP_CREATED);
        }

        return response()->json([
            'success' => false,
            'message' => 'Registration failed'
        ], ResponseConstant::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function login(LoginRequest $request): JsonResponse
    {

    }
}
