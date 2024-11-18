<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all costs with related user and voucher data
        $costs = Cost::with(['user', 'voucher'])->get();

        return response()->json($costs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'voucher_id' => 'required|exists:vouchers,id',
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        // Create a new cost entry
        $cost = Cost::create($validatedData);

        return response()->json($cost, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the cost by ID with related user and voucher data
        $cost = Cost::with(['user', 'voucher'])->findOrFail($id);

        return response()->json($cost);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the cost entry
        $cost = Cost::findOrFail($id);

        // Validate the request
        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'voucher_id' => 'sometimes|required|exists:vouchers,id',
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        // Update the cost entry
        $cost->update($validatedData);

        return response()->json($cost);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the cost entry
        $cost = Cost::findOrFail($id);

        // Delete the cost entry
        $cost->delete();

        return response()->json(null, 204);
    }
}
