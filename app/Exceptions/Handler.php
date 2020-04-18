<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        //如果是未登录,则跳转到登录页
        if($exception instanceof AuthenticationException && $exception->getMessage() == 'Unauthenticated.'){
            return redirect()->route('manage.login');
        }
        if ($exception && !env('APP_DEBUG')) {
            //其他错误
            $statusCode = 404;
            if($exception instanceof HttpException){
                $statusCode = $exception->getStatusCode();
            }
            return response()->view('error.'.$statusCode, [], $statusCode);
        }
        return parent::render($request, $exception);
    }
}
