<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\InvalidOrderException;
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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
   /* public function register()
    {
        $this->renderable(function (Throwable $e) {
            $code = $e->getStatusCode();
            if($code == 404) {
                return response()->view('errors.error');
            //    return redirect()->route('errors.error');
                 // return redirect('errors.error');
            }
        });
    }*/



   
    
}
