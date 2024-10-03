<?php

namespace App\Http\Resources;


use App\Http\Controllers\Controller;
use App\Models\Inv;
use Illuminate\Http\Request;

class InvController extends Controller
{
    public function index()
    {
        return Inv::all();
    }

    public function store(Request $request)
    {
        $inv = Inv::create($request->all());
        return response()->json($inv, 201);
    }

    public function show($id)
    {
        return Inv::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $inv = Inv::findOrFail($id);
        $inv->update($request->all());
        return response()->json($inv, 200);
    }

    public function destroy($id)
    {
        Inv::destroy($id);
        return response()->json(null, 204);
    }
}
