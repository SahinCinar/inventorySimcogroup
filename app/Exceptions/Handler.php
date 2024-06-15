<?php

namespace App\Exceptions;

use Throwable; // Voeg deze regel toe

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Throwable  $exception  // Verander Exception naar Throwable
     * @return void
     */
    public function report(Throwable $exception) // Verander Exception naar Throwable
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception  // Verander Exception naar Throwable
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception) // Verander Exception naar Throwable
    {
        return parent::render($request, $exception);
    }
}
