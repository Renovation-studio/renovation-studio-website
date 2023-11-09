<?php

namespace App\Http\Controllers;

use App\Models\CompPracUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends Controller
{
    public function index() {
        $user = CompPracUser::find(1);
        $str = 'gfweftgwetg';
        dd($user->email);
    }
}
