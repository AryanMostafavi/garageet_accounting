<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname'    => 'required|string|max:255',
            'lastname'     => 'required|string|max:255',
            'username'     => 'required|string|max:255|unique:users',
            'phonenumber'  => 'required|string|max:20|unique:users',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:8',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'phonenumber' => $request->phonenumber,
                'email' => $request->email,
                'api_token' => Hash::make($request->password),
            ]);
        }catch (\Exception $exception){
            return response()->json([$exception->getMessage()]);
        }


        return response()->json([
            'user' => $user,
        ], 201);
    }
}
