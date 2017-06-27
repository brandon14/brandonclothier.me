<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $e)
    {
        $e = $this->prepareException($e);

        if ($e instanceof HttpResponseException) {
            return $e->getResponse();
        } elseif ($e instanceof AuthenticationException) {
            return $this->unauthenticated($request, $e);
        } elseif ($e instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($e, $request);
        }

        return $request->expectsJson()
            ? $this->prepareJsonResponse($request, $e)
            : $this->prepareResponse($request, $e);
    }

    /**
     * Render a exception into a JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function prepareJsonResponse($request, Exception $e)
    {
        // Get the error code, headers and message from the exception.
        $status = $this->isHttpException($e) ? $e->getStatusCode() : 500;
        $headers = $this->isHttpException($e) ? $e->getHeaders() : [];
        $message = $this->isHttpException($e) ? $e->getMessage() : 'Internal Server Error.';

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
            $data['error']['file'] = $e->getFile();
            $data['error']['line'] = $e->getLine();
            $data['error']['trace'] = $e->getTrace();
        }

        // Return a new json response with the error message and code
        return new JsonResponse($data, $status, $headers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Prepare exception for rendering.
     *
     * @param  \Exception  $e
     * @return \Exception
     */
    protected function prepareException(Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        } elseif ($e instanceof AuthorizationException) {
            $e = new AccessDeniedHttpException($e->getMessage());
        } elseif ($e instanceof TokenMismatchException) {
            $e = new HttpException(419, 'CSRF Token Mismatch.');
        }

        return $e;
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        if ($request->expectsJson()) {
            $data = [
                'error' => [
                    'code'    => 422,
                    'message' => $e->getMessage(),
                    'errors'  => $errors,
                ],
            ];

            if (config('app.debug')) {
                $data['error']['file'] = $e->getFile();
                $data['error']['line'] = $e->getLine();
                $data['error']['trace'] = $e->getTrace();
            }

            return new JsonResponse($data, 422, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }

        if ($e->response) {
            return $e->response;
        }

        return redirect()
            ->back()
            ->withInput($request->input())
            ->withErrors($errors);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $e)
    {
        if ($request->expectsJson()) {
            $data = [
                'error' => [
                    'code'    => 401,
                    'message' => 'Unauthenticated.',
                ],
            ];

            if (config('app.debug')) {
                $data['error']['file'] = $e->getFile();
                $data['error']['line'] = $e->getLine();
                $data['error']['trace'] = $e->getTrace();
            }

            return new JsonResponse($data, 401, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }

        return redirect()->guest(route('login'));
    }
}
