<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use App\Models\VoucherEntity;

class voucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::with('entries')->where('user_id', Auth::id())->get();
        return response()->json($vouchers);
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
            'date' => 'required|date',
            'description' => 'required|string',
            'type' => 'required|string|in:buy,sale',
            'total_amount' => 'required|numeric',
            'debit_account' => 'required|string',
            'credit_account' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Create the Voucher
        $voucher = Voucher::create([
            'date' => $request->date,
            'description' => $request->description,
            'type' => $request->type,
            'total_amount' => $request->total_amount,
            'user_id' => Auth::id(),
        ]);

        // Create the Debit Entry
        VoucherEntry::create([
            'voucher_id' => $voucher->id,
            'account_title' => $request->debit_account,
            'debit' => $request->amount,
            'credit' => null,
        ]);

        // Create the Credit Entry
        VoucherEntry::create([
            'voucher_id' => $voucher->id,
            'account_title' => $request->credit_account,
            'debit' => null,
            'credit' => $request->amount,
        ]);

        return response()->json(['message' => 'Voucher created successfully', 'voucher' => $voucher], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $voucher = Voucher::with('entries')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return response()->json($voucher);
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
