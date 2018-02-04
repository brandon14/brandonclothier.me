<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * Response factory.
     *
     * @var \Illuminate\Contracts\Routing\ResponseFactory;
     */
    protected $response;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [];

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
     * Constructs a new application exception handler.
     *
     * @param  Container  $container
     * @param  ResponseFactory  $response
     */
    public function __construct(Container $container, ResponseFactory $response)
    {
        parent::__construct($container);

        $this->response = $response;
    }

    /**
     * Prepare exception for rendering.
     *
     * @param  \Exception  $exception
     * @return \Exception
     */
    protected function prepareException(Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            $exception = new NotFoundHttpException($exception->getMessage(), $exception);
        } elseif ($exception instanceof AuthorizationException) {
            $exception = new AccessDeniedHttpException($exception->getMessage());
        } elseif ($exception instanceof TokenMismatchException) {
            $exception = new HttpException(419, $exception->getMessage() ?: 'Token mismatch.');
        }

        return $exception;
    }

    /**
     * Prepare a JSON response for the given exception.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception                $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function prepareJsonResponse($request, Exception $exception)
    {
        // Get the error code, headers and message from the exception.
        $status = $this->isHttpException($exception) ? $exception->getStatusCode() : 500;
        $headers = $this->isHttpException($exception) ? $exception->getHeaders() : [];
        $message = $this->isHttpException($exception) ? $exception->getMessage() : 'Internal Server Error.';

        // Construct the general JSON data array.
        $data = [
            'error' => [
                'code'    => $status,
                'message' => $message,
            ],
        ];

        // If the app is running in debug mode, we can get more debug information such as the file, line
        // and stack trace.
        if (config('app.debug')) {
            $data['error']['file'] = $exception->getFile();
            $data['error']['line'] = $exception->getLine();
            $data['error']['trace'] = $exception->getTrace();
        }

        // Return a new json response with the error message and code
        return $this->response->json($data, $status, $headers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request                  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     *
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            $data = [
                'error' => [
                    'code'    => 401,
                    'message' => 'Unauthenticated.',
                ],
            ];

            if (config('app.debug')) {
                $data['error']['file'] = $exception->getFile();
                $data['error']['line'] = $exception->getLine();
                $data['error']['trace'] = $exception->getTrace();
            }

            return $this->response->json($data, 401, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }

        return redirect()->guest(route('login'));
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param  \Illuminate\Http\Request                    $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        $errors = $exception->validator->errors()->getMessages();
        $code = $exception->status;

        $data = [
            'error' => [
                'code'    => $code,
                'message' => $exception->getMessage(),
                'errors'  => $errors,
            ],
        ];

        if (config('app.debug')) {
            $data['error']['file'] = $exception->getFile();
            $data['error']['line'] = $exception->getLine();
            $data['error']['trace'] = $exception->getTrace();
        }

        return $this->response->json($data, $code, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
