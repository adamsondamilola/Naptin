<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\TraineeRegistrationService;
use App\Http\Requests\TraineeRegistrationRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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
        if ($registerNewTrainee) {
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

    public function verify(EmailVerificationRequest $request): void
    {
        dd('stop here');
        $request->fulfill();
        dd(Auth::check(), Auth::user());
    }
}
