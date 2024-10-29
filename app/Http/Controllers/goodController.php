<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class goodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required|string',
            'stock' => 'required|integer',
            'cost_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
        ]);

        $good = Good::create($request->only(['name', 'stock', 'cost_price', 'sale_price']));

        return response()->json(['message' => 'Good added to inventory successfully', 'good' => $good], 201);
    }

    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer',
        ]);

        $good = Good::findOrFail($id);
        $good->stock = $request->stock;
        $good->save();

        return response()->json(['message' => 'Stock updated successfully', 'good' => $good], 200);
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
