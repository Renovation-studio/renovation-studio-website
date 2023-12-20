<?php

namespace App\Http\Controllers;

use App\Models\Phones;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function store(Request $request)
    {
        $phones = Phones::create([
            'phone' => $request['phone'],
        ]);

        return isset($phones->id);
    }
}
