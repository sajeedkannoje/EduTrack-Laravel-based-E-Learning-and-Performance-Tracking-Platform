<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    public function __construct()
    {

        $this->middleware('guest')->except('logout');

    }

    // Login

    public function showLoginForm()
    {

        $pageConfigs = [

            'bodyClass' => 'bg-full-screen-image',

            'blankPage' => true,

        ];

        return view('/auth/login', [

            'pageConfigs' => $pageConfigs,

        ]);

    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)
        // ->orWhere('name', '=', $request->email)
            ->first();
        if (! $user) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.email')],
            ]);
        }
        if ($user && ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => [trans('auth.password')],
            ]);
        }

        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }
}
