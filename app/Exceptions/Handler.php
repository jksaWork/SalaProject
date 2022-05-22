<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Foundation\Exceptions\ReportableHandler;
use Illuminate\Support\Facades\Mail;
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $ex) {
            info($ex->getMessage());
            if(config('app.env')== 'production'){
                info('the excption was handel');
                Mail::to('jksa.work.1@gmail.com')->send(new \App\Mail\MailException($e->getMessage() , $e->getFile() , $e->getLine() , $e->getTraceAsString()));
                return abort(403, 'Server Is Down Please Try Again Later');
            }
        });
    }

    public function report(Throwable $e)
    {
        // if(config('app.env')== 'production'){
            info('the excption was handel');
            Mail::to('jksa.work.1@gmail.com')->send(new \App\Mail\MailException($e->getMessage() , null , null));
            return abort(403, 'Server Is Down Please Try Again Later');
        // }
    }
}
