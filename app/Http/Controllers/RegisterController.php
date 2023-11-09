<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CompPracUser;


class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request) {
        $user = CompPracUser::create([
            'id' => $request->id,
            'username' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'avatarUrl' => $request->avatarUrl,
            'hash' => Hash::make($request->password)
        ]);
       dd($request->all());
        }
}
