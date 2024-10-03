<?php
namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function index()
    {
        return Cost::all();
    }

    public function store(Request $request)
    {
        $cost = Cost::create($request->all());
        return response()->json($cost, 201);
    }

    public function show($id)
    {
        return Cost::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cost = Cost::findOrFail($id);
        $cost->update($request->all());
        return response()->json($cost, 200);
    }

    public function destroy($id)
    {
        Cost::destroy($id);
        return response()->json(null, 204);
    }
}
