<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\UserRegistrationService;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class AuthController extends Controller
{
    public function __construct(
        private readonly UserRegistrationService $userRegistrationService,
        private readonly UserRepository $userRepository
    )
    {
    }

    public function register(UserRegistrationRequest $request): JsonResponse
    {
        $newUser = $this->userRegistrationService->createTrainee($request->all());
        $responseData = [];
        if ($newUser) {
            $responseData['message'] = ucfirst($request->post('userType')).' Successfully Registered';
            $responseData['data'] = $newUser;
            $responseData['status'] = ResponseConstant::HTTP_CREATED;
        } else {
            $responseData['message'] = 'Registration failed';
            $responseData['data'] = null;
            $responseData['status'] = ResponseConstant::HTTP_INTERNAL_SERVER_ERROR;
        }
        return response()->json([
            'message' => $responseData['message'],
            'data' => $responseData['data']
        ], $responseData['status']);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->userRepository->getByEmail($request->post('email'));
        if (!$user || ! Hash::check($request->post('password'), $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], ResponseConstant::HTTP_UNAUTHORIZED);
        }
        return response()->json([
            'message' => 'Authentication successful',
            'auth_token' => $user->createToken(config('auth.token_name'))->plainTextToken,
            'user' => $user
        ], ResponseConstant::HTTP_OK);

    }

    public function logout(): JsonResponse
    {
        $user = $this->userRepository->getByUuid(auth()->user()->uuid);
        $user->tokens()->delete();
        return response()->json(['message' => 'Logout successful'], ResponseConstant::HTTP_OK);
    }
}
