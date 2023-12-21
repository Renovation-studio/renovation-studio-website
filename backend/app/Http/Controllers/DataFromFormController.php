<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataFromForm;
use Illuminate\Http\Request;

class DataFromFormController extends Controller
{
    public function index()
    {
        return view("data.index");
    }

    public function feedback(Request $request)
    {
        $data = $request->validate([
            "name" => 'required|string',
            "phone" => 'required|string',
            "mail" => 'required|string',
        ]);

        DataFromForm::create($data);
        //Schema::create('users', function (Blueprint $table){$data});

        return redirect(route('data.index'));
    }
}
