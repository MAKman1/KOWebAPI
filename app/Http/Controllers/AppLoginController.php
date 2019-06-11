<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class AppLoginController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'contact_no' => ['required', 'string', 'max:13', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'username' => ['required', 'string', 'unique:users'],
            'gender' => ['required', 'integer'],
            'bio' => ['required', 'string'],
        ]);
 
        $user = User::create([
            'name' => $data['name'],
            'contact_no' => $data['contact_no'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'gender' => $data['gender'],
            'bio' => $data['bio'],
        ]);
 
        $token = $user->createToken('KOTheChallenge')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginUserName(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('KOTheChallenge')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginContactNumber(Request $request)
    {
        $credentials = [
            'contact_no' => $request->contact_no,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('KOTheChallenge')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
}
