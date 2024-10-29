<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class saleController extends Controller
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
            'item_name' => 'required|string',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
        ]);

        $voucher = Voucher::findOrFail($voucherId);

        $totalPrice = $request->quantity * $request->unit_price;

        $sale = Sale::create([
            'voucher_id' => $voucher->id,
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_price' => $totalPrice,
        ]);

        return response()->json(['message' => 'Sale recorded successfully', 'sale' => $sale], 201);
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
