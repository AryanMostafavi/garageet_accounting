<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'string|required',
            'desc'=>'string|required',
            'type'=>'string|required',
        ]);
        try {
        Good::create([
            'name' => $request->name,
            'desc' => $request->desc,
        'type' => $request->type
        ]);
    }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], 500);
        }
        return response()->json(['message' => 'Good created successfully'], 200);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
