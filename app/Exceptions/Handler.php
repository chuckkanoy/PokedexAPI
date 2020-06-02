<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => [
                    'code' => 'NOT_FOUND',
                    'message' => 'NOT_FOUND'
                ]
            ], 404);
        } else if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => [
                    'code' => 'MODEL_NOT_FOUND',
                    'message' => $exception->getMessage()
                ]
            ], 404);
        } else if ($exception instanceof ValidationException) {
            return response()->json([
                'error' => [
                    'code' => 'VALIDATION_ERROR',
                    'message' => 'You have validation errors in your submission',
                    'validation_messages' => json_decode($exception->getMessage())
                ]
            ], 422);
        }

        return parent::render($request, $exception);
    }
}
