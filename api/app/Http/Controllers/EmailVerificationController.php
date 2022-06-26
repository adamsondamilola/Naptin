<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\GenerahResponse;
use App\Http\Requests\EmailVerificationRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class EmailVerificationController extends Controller
{
    public function __construct(private readonly UserRepository $userRepository, private readonly GenerahResponse $response)
    {
    }

    public function verify(EmailVerificationRequest $request): JsonResponse
    {
        $user = $this->userRepository->getById((int)$request->route('id'));

        $this->response->success = true;
        if ($user->hasVerifiedEmail()) {
            $this->response->message = 'Email already verified';
        } elseif ($user->markEmailAsVerified()) {
            $this->response->message = 'Email verification successful';
        }
        return response()->json($this->response, ResponseConstant::HTTP_OK);
    }
}
