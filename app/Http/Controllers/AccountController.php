<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
    }

    public function updateBasicInfo(Request $request)
    {
        request()->validate([
            'first_name' => 'string|min:3|required',
            'last_name' => 'string|min:3|required',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');

        if (! $user->isDirty()) {
            return response()->json([
                'success' => true,
                'code' => 'warning',
                'message' => ' No change detected. You haven\'t made any changes.',
                'title' => 'Warning!',
            ]);
        }
        $user->save();

        return response()->json([
            'success' => true,
            'code' => 'success',
            'message' => 'Your Information is changed successfully',
            'title' => 'Congratulations!',
        ]);
    }

    public function changeMyPassword(Request $request)
    {
        // dd($request);

        request()->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = auth()->user();

        if (! Hash::check($request->get('current_password'), $user->password)) {
            return response()->json([
                'success' => true,
                'code' => 'error',
                'message' => 'Current password entered by you is not correct.',
                'title' => 'Please Check!',
            ]);
        }

        $user->password = bcrypt($request->get('password'));
        $user->save();

        return response()->json([
            'success' => true,
            'code' => 'success',
            'message' => 'Your password is changed successfully',
            'title' => 'Congratulations!',
        ]);

    }

    public function changeMyEmail(Request $request)
    {

        request()->validate([
            // "email" => 'required|email|unique:users,email',
            'email' => ['required', 'email',
                Rule::unique('users')->ignore(auth()->id())],
            'email_confirmation' => 'required|email|same:email',
        ]);

        $user = auth()->user();
        $user->email = $request->get('email');
        // dd($user->isDirty());
        if (! $user->isDirty()) {
            return response()->json([
                'success' => true,
                'code' => 'warning',
                'message' => 'You entered same email address which is currently active.',
                'title' => 'Unmodified!',
            ]);

        }
        $user->email_verified_at = date('Y-m-d h:m:s');

        $user->save();

        // $request->user()->sendEmailVerificationNotification();
        // $html = view('account.account_component.account-email-component');
        return response()->json([
            'success' => true,
            'code' => 'success',
            'message' => 'Your Email is changed successfully.',
            'title' => 'Congratulations!',
            'email' => $user->email,
        ]);

    }

    public function addReferralCode(Request $request)
    {

        request()->validate([
            'referral' => 'required|max:6|min:6',
        ]);
        $teacher = User::where('referral_code', $request->referral)->where('is_active', 1)->first();
        //    dd($teacher);
        if ($teacher) {
            if ($teacher->hasRole('teacher')) {
                $user = auth()->user();
                $user->referred_by = $teacher->id;
                $user->save();

            } else {
                return response()->json([
                    'success' => true,
                    'code' => 'warning',
                    'message' => 'Wrong Referral Code! Or Inacitve Teacher.',
                    'title' => 'Oops!',
                ]);

            }

        } else {
            return response()->json([
                'success' => true,
                'code' => 'warning',
                'message' => 'Wrong Referral Code! Or Inacitve Teacher.',
                'title' => 'Oops!',
            ]);

        }

        return response()->json([
            'success' => true,
            'code' => 'success',
            'message' => 'Your Referral code Added successfully',
            'title' => 'Congratulations!',
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
