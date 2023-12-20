<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\RestorePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
Use Str;
Use Mail;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="api/auth/signin",
     *     tags={"user"},
     *     summary="Log in user account and creates new user session",
     *     operationId="signinUser",
     *     @OA\Parameter(
     *         name="email",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="email",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="phoneNumber",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             maxLength=11,
     *             minLength=11
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             minLength=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull login"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid credentials"
     *     ),
     * )
     */
    public function signin(SigninRequest $request) {
        $validated = request()->validate([
            'phoneNumber' => 'required_without:email',
            'email' => 'required_without:phoneNumber|email',
            'password' => 'required'
        ]);
        $remember = $request['remember-me'];
        if(auth()->attempt($validated,$remember))
        {
            $request->session()->regenerate();
            return "Logged in!";
        }
        else{
            return "WRONG";
        }
    }

    /**
     * @OA\Post(
     *     path="api/auth/signout",
     *     tags={"user"},
     *     summary="Clears current user session",
     *     operationId="signoutUser",
     *     @OA\Response(
     *         response=200,
     *         description="Successfull logout"
     *     )
     * )
     */
    public function signout(Request $request) {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return "Logged Out";
    }

    /**
     * @OA\Post(
     *     path="api/auth/restore-password",
     *     tags={"user"},
     *     summary="Log in user account and creates new user session",
     *     operationId="restorePassword",
     *     @OA\Parameter(
     *         name="email",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="email"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull restore"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="User not found"
     *     ),
     * )
     */
    public function restorePassword(Request $request) {
        // $validated = request()->validate([
        //     'email' => 'required|email'
        // ]);
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->input('email'))->first();

        if(!empty($user))
        {
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return "go reset";
        }
        else{
            return "not true";
        }
    }

    public function resetPassword($id) {
        $user = User::where('id', '=', $id);
        if(!empty($user))
        {
            return "Frontend does not exist, use postman for now";
        }
    }

    public function post_resetPassword($id, Request $request) {
        $user = User::where('id', '=', $id);
        if(!empty($user))
        {
            if($request->password == $request->cpassword)
            {
                $user->update(['password' => Hash::make($request->password)]);
                if(empty($user->email_verified_at))
                {
                    $user->update(['email_verified_at' => date('Y-m-d H:i:s')]);
                }
                return "Password reset!";
            }
            else{
                return "Does not match";
            }
        }
    }

    /**
     * @OA\Post(
     *     path="api/auth/signup",
     *     tags={"user"},
     *     summary="Creates new user account and creates new user session",
     *     operationId="signupUser",
     *     @OA\Parameter(
     *         name="username",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="email",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="email"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="phoneNumber",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             maxLength=11,
     *             minLength=11
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             minLength=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull creation of user"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="User already exists"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid format"
     *     ),
     * )
     */
    public function signup(SignupRequest $request) {
        return "Signup";
    }
}
