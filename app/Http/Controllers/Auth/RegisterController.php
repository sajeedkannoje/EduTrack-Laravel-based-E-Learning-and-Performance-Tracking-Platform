<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd(!isset($data['teacher_mode']));

        $validatArry = [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'firstname' => ['string', 'max:255'],
            'lastname' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];

        if ($data['referral_code']) {
            $validatArry = Arr::add($validatArry, 'referral_code', ['min:6', 'max:6', 'exists:users,referral_code']);
        }

        return Validator::make($data, $validatArry);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $studentInfo = [
            'name' => preg_replace('/[^a-zA-Z0-9_]/', '_', $data['name']),
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => date('Y-m-d h:m:s'),
        ];

        if ($data['referral_code'] && ! isset($data['teacher_mode'])) {
            $teacher = $this->getTeacherInfo($data['referral_code']);
            if ($teacher->hasRole('teacher')) {
                $studentInfo = Arr::add($studentInfo, 'referred_by', $teacher->id);
                $user = User::create($studentInfo);
                $user->syncRoles(['student']);
            } else {
                throw ValidationException::withMessages(['referral_code' => 'Invalid Teacher or Expire Referral Code!']);
            }
        } elseif (isset($data['teacher_mode'])) {
            $studentInfo = Arr::add($studentInfo, 'referral_code', $this->generateNumber());
            $user = User::create($studentInfo);
            $user->syncRoles(['teacher']);
        } else {
            $user = User::create($studentInfo);
            $user->syncRoles(['student']);
        }

        return $user;
    }

    private function getTeacherInfo($value)
    {
        return User::where('referral_code', $value)->first();
    }

    private static function generateNumber()
    {
        $code = Str::random(6);
        if (User::where('referral_code', $code)->count() > 0) {
            self::generateNumber();
        }

        return $code;
    }

    // Register
    public function showRegistrationForm()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/register', [
            'pageConfigs' => $pageConfigs,
        ]);
    }
}
