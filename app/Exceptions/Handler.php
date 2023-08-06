<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;

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
        $this->renderable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
            if (Auth::check()) {                              // CHECK USER LOGGED IN OR NOT
                if (auth()->user()->hasRole('teacher')) {     // CHECK IF USER IS TEACHER
                    return redirect('login');              // REDIRECT BACK
                }

                return redirect('login');              // REDIRECT BACK
            } else {
                return redirect('login');               //REDIRECT TO LOG-IN PAGE IF USER NOT LOGGED IN
            }
        });
    }
}
