<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all bank accounts with related user data
        $accounts = BankAccount::with('user')->get();

        return response()->json($accounts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'account_name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'balance' => 'nullable|numeric|min:0',
        ]);

        // Create a new bank account
        $account = BankAccount::create($validatedData);

        return response()->json($account, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the bank account by ID
        $account = BankAccount::with('user')->findOrFail($id);

        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the bank account
        $account = BankAccount::findOrFail($id);

        // Validate the request
        $validatedData = $request->validate([
            'account_name' => 'sometimes|required|string|max:255',
            'user_id' => 'sometimes|required|exists:users,id',
            'balance' => 'nullable|numeric|min:0',
        ]);

        // Update the bank account
        $account->update($validatedData);

        return response()->json($account);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the bank account
        $account = BankAccount::findOrFail($id);

        // Delete the bank account
        $account->delete();

        return response()->json(null, 204);
    }
}
