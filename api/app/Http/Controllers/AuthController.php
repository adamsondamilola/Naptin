<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\TraineeRegistrationRequest;
use App\Services\TraineeRegistrationService;
use Illuminate\Http\JsonResponse;
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
        $registerNewTrainee = $this->traineeRegistration->createUser($request->all());
        if($registerNewTrainee){
            return response()->json([
                'success' => true,
                'message' => 'Trainee Successfully Registered'
            ], ResponseConstant::HTTP_CREATED);
        }

        return response()->json([
            'success' => false,
            'message' => 'Registration Not Successful'
        ], ResponseConstant::HTTP_INTERNAL_SERVER_ERROR);
    }
}
