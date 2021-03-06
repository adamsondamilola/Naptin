<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\ApplicantRequest;
use App\Services\ApplicantService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;

class ApplicantController extends Controller
{
    public function __construct(private readonly ApplicantService $applicantService)
    {
    }

    public function store(ApplicantRequest $request): JsonResponse
    {
        $newApplication = $this->applicantService->createApplication($request->post('courseUuid'));
        $status = $newApplication->isSuccess() ? ResponseConstant::HTTP_CREATED : ResponseConstant::HTTP_CONFLICT;
        return response()->json($newApplication, $status);
    }
}
