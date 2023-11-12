<?php

namespace App\Http\Controllers;

use App\Models\Services;
use http\Env\Response;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = trim($request->get('q'));
        if ($q) {
            //return Catalog::query()->whereRaw('LOWER(title) LIKE ?', ["%" . mb_strtolower($q) . "%"])->get();
            return Services::query()->where('title', 'like', "%" . $q . "%")->get();
        }
        //dd(Catalog::all());
        //return json_encode(Catalog::all(), JSON_UNESCAPED_UNICODE);
        return Services::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Services::find($id)->elementServices()->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
