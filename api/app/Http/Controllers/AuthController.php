<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\TraineeRegistrationService;
use App\Http\Requests\TraineeRegistrationRequest;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class AuthController extends Controller
{
    private TraineeRegistrationService $traineeRegistration;

    public function __construct()
    {
        $this->traineeRegistration = new TraineeRegistrationService();
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
}
