<?php

namespace App\Http\Controllers;

use App\Models\ElementServices;
use App\Models\Services;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = trim($request->get('q'));
        if ($q) {
            return Services::query()->whereRaw('LOWER(title) LIKE ?', ["%" . mb_strtolower($q) . "%"])->get();
            //return Services::query()->where('title', 'like', "%" . $q . "%")->get();
        }
        //return json_encode(Catalog::all(), JSON_UNESCAPED_UNICODE);
        return Services::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Services::find($id)->elements()->get();
    }
}
