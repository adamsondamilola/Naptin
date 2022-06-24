<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\UserRegistrationService;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class AuthController extends Controller
{
    public function __construct(
        private readonly UserRegistrationService $userRegistrationService,
        private readonly AuthenticationService   $authService,
        private readonly UserRepository          $userRepository
    )
    {
    }

    public function register(UserRegistrationRequest $request): JsonResponse
    {
        $responseData = $this->userRegistrationService->createUser($request->all());
        $status = $responseData->success ? ResponseConstant::HTTP_OK : ResponseConstant::HTTP_INTERNAL_SERVER_ERROR;
        return response()->json($responseData, $status);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->userRepository->getByEmail($request->post('email'));
        $responseData = $this->authService->login($user, $request->post('password'));
        return response()->json($responseData, ResponseConstant::HTTP_OK);
    }

    public function logout(): JsonResponse
    {
        $user = $this->userRepository->getByUuid(auth()->user()->uuid);
        $this->authService->invalidateTokens($user);
        return response()->json(['message' => 'Logout successful'], ResponseConstant::HTTP_OK);
    }
}
