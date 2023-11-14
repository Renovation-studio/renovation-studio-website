<?php

namespace App\Http\Controllers;

use App\Models\Elements;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return json_encode(Element::all(), JSON_UNESCAPED_UNICODE);
        return Elements::all();
    }
}
