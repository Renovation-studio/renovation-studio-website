<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\RestorePasswordRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin(SigninRequest $request) {
        return response()->json([
            "validated?"=> "YES!!",
        ]);
    }

    public function signout(Request $request) {
        return 'Where are you going?';
    }

    public function restorePassword(RestorePasswordRequest $request) {
        return 'Restore password';
    }

    public function signup(SignupRequest $request) {
        return response()->json([
            "validated?"=> "YES!!",
        ]);
    }
}
