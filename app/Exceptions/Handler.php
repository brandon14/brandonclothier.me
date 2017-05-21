<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // Make sure if the request expects JSON to return JSON
        // exceptions
        if ($request->expectsJson()) {
            $this->renderJsonException($exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * Render a exception into a JSON response.
     *
     * @param \Exception  $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function renderJsonException(Exception $exception)
    {
        // Check that we have a getStatusCode method on the exception
        if (method_exists($exception, 'getStatusCode')) {
            $code = $exception->getStatusCode();
        } else {
            $code = 500;
        }

        // If the app is running in debug mode, we can try to get the exception message, otherwise we
        // need to return a general error message.
        if (config('app.debug')) {
            if (method_exists($exception, 'getMessage') && ! empty($exception->getMessage())) {
                $message = $exception->getMessage();
            } else {
                $message = 'Internal Server Error.';
            }
        } else {
            $message = 'Oops! Something went wrong.';
        }

        // Return a new json response with the error message and code
        return new JsonResponse([
            'error' => [
                'code' => $code,
                'message' => $message,
            ],
        ], $code);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return new JsonResponse([
                'error' => [
                    'code' => 401,
                    'message' => 'Unauthenticated.',
                ],
            ], 401);
        }

        return redirect()->guest(route('login'));
    }
}
