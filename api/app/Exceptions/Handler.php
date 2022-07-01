<?php

namespace App\Exceptions;

use App\Http\GenerahPayload;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseConstant;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): JsonResponse
    {
        $payload = new GenerahPayload();
        if ($e instanceof ModelNotFoundException) {
            $model = explode('\\', $e->getModel());
            $modelPhrase = ucwords(implode('', preg_split('/(?=[A-Z])/', end($model))));
            $errorMessage = \App::make($e->getModel())->modelNotFoundMessage ?? $modelPhrase . ' not found';

            return response()->json($payload->setPayload(false, $errorMessage), ResponseConstant::HTTP_NOT_FOUND);
        }
        return response()->json($payload->setPayload(false), ResponseConstant::HTTP_INTERNAL_SERVER_ERROR);
    }
}
