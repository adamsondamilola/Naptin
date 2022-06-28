<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Services\UserProfileService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class UserProfileController extends Controller
{
    public function __construct(private readonly UserProfileService $userProfileService)
    {
    }

    public function updateAddress(UserAddressRequest $request): JsonResponse
    {
        $responseData = $this->userProfileService->updateAddress($request->all());
        return $responseData->isSuccess()
            ? response()->json($responseData, ResponseConstant::HTTP_OK)
            : response()->json($responseData, ResponseConstant::HTTP_INTERNAL_SERVER_ERROR);
    }
}
