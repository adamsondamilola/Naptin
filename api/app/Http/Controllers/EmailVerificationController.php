<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailVerificationRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class EmailVerificationController extends Controller
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function verify(EmailVerificationRequest $request): JsonResponse
    {
        $message = '';
        $user = $this->userRepository->getById($id);

        if ($user->hasVerifiedEmail()) {
            $message = 'Email already verified';
        } elseif ($user->markEmailAsVerified()) {
            $message = 'Email verification successful';
        }
         return response()->json([
             'message' => $message
         ], ResponseConstant::HTTP_OK);
    }
}
