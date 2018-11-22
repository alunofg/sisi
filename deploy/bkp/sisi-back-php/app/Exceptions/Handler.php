<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Queue\MaxAttemptsExceededException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use League\OAuth2\Server\Exception\OAuthServerException;
use Prettus\Validator\Exceptions\ValidatorException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        OAuthServerException::class,
        MaxAttemptsExceededException::class
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {

        if ($exception instanceof ValidationException) {
            return $this->renderValidationException($exception);
        }

        if ($exception instanceof ValidatorException) {
            return $this->renderValidatorException($exception);
        }

        return parent::render($request, $exception);
    }

    private function renderValidationException($exception)
    {
        $bag = $exception->validator->getMessageBag();

        return response()->json([
            'error'   => true,
            'data'    => implode(', ', $this->parseMessages($bag)),
            'message' => $bag
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function renderValidatorException($exception)
    {
        $bag = $exception->getMessageBag();

        return response()->json([
            'error'   => true,
            'data'    => implode(', ', $this->parseMessages($bag)),
            'message' => $bag
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function parseMessages($bag)
    {
        $messages = [];

        if(is_object($bag)){
            $bag = json_decode(json_encode($bag), true);
            foreach($bag as $field){
                foreach($field as $m){
                    $messages[] = $m;
                }
            }
        }

        return $messages;
    }
}
