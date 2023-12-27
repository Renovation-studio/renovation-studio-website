<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\RestorePasswordRequest;
use App\Http\Requests\RequestResetTokenRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="api/login",
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
     *     @OA\Response(
     *         response=401,
     *         description="User was not found"
     *     ),
     * )
     */
    public function login(SigninRequest $request) {
        $validated = $request->validated();

        $email = $validated['email'] ?? null;
        $number = $validated['phoneNumber'] ?? null;
        $user = null;

        if ($email != null) {
            $user = User::where('email', $email)->first();
        } 
        
        if ($number != null && $user != null) {
            $user = User::where('phoneNumber', $number)->first();
        }

        if ($user == null) {
            return response()->json([
                'message' => 'User was not found'
            ], 401);
        }

        if(Hash::check($validated['password'], $user['password']))
        {
            $request->session()->put('userId', $user['id']);
            return $user;
        }
        else {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 400);
        }
    }

    /**
     * @OA\Post(
     *     path="api/logout",
     *     tags={"user"},
     *     summary="Clears current user session",
     *     operationId="signoutUser",
     *     @OA\Response(
     *         response=200,
     *         description="Successfull logout"
     *     )
     * )
     */
    public function logout(Request $request) {
        request()->session()->invalidate();
        return "Successfull logout";
    }

    private function createTokenHash(string $token) {
        return hash("sha256", $token);
    }

    /**
     * @OA\Post(
     *     path="api/restore-password",
     *     tags={"user"},
     *     summary="Sets new password with token",
     *     operationId="restorePassword",
     *     @OA\Parameter(
     *         name="token",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="newPassword",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Password was successfully updated"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid token"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="User was not found"
     *     ),
     * )
     */
    public function restorePassword(RestorePasswordRequest $request) {
        $validated = $request->validated();
        $hashed_token = $this->createTokenHash($validated['token']);

        $id = Redis::get($hashed_token);

        if (!empty($id)) {
            $user = User::whereId($id)->first();

            if (empty($user)) return response()->json([
                'message' => 'User was not found'
            ], 401);

            User::whereId($id)->update(['password' => Hash::make($validated['newPassword'])]);

            return 'Password was successfully updated';
        } else {
            return response()->json([
                'message' => 'Invalid token'
            ], 400);
        }
    }

    /**
     * @OA\Post(
     *     path="api/request-reset-token",
     *     tags={"user"},
     *     summary="Creates new reset token",
     *     operationId="requestResetToken",
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

    public function requestResetToken(RequestResetTokenRequest $request) {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();
        if(!empty($user)) {
            $token = bin2hex(random_bytes(64));
            $hashed_token = $this->createTokenHash($token);

            Redis::set($hashed_token, $user['id'], 'EX', 300);
            
            return response()->json([
                'token' => $token
            ]);
        } else {
            return response()->json([
                'message' => 'User was not found'
            ], 400);
        }
    }

    public function getProfile(Request $request) {
        $id = $request->session()->get('userId', null);
        if ($id == null) {
            return response()->json([
                'message' => 'User is not authorised (session)'
            ], 401);
        }

        $user = User::whereId($id)->first();

        if (empty($user)) {
            return response()->json([
                'message' => 'User is not authorised'
            ], 401);
        }

        return $user;
    }
}
