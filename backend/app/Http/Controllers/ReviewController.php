<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Feedback::all();
        return view("data.index", ['reviews' => $reviews]);
    }

}
