<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\GenerahPayload;
use App\Http\Requests\EmailVerificationRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class EmailVerificationController extends Controller
{
    public function __construct(private readonly UserRepository $userRepository, private readonly GenerahPayload $payload)
    {
    }

    public function verify(EmailVerificationRequest $request): JsonResponse
    {
        $user = $this->userRepository->getById((int)$request->route('id'));

        if ($user->hasVerifiedEmail()) {
            $this->payload->setPayload(true, 'Email already verified');
        } elseif ($user->markEmailAsVerified()) {
            $this->payload->setPayload(true, 'Email verification successful');
        }
        return response()->json($this->payload, ResponseConstant::HTTP_OK);
    }
}
