<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }
        
    /**
     * register
     *
     * @param  username
     * @param  email
     * @param  password
     * @return User
     */
    public function register(Request $request){
        $user = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'api_token' => Str::random(50)
        ]);

        return response()->json([
            'user'  => $user
        ], 200);
    }
    
    /**
     * login
     *
     * @param  email
     * @param  password
     * @return User
     */
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();

        // No user found in database
        if(!$user){
            return response()->json([
                'status' => 'error' , 
                'message' => 'User Not Found'
            ], 401);
        }

        // user password matched
        if(Hash::check($request->password , $user->password)){
            $user->update([
                'api_token' => Str::random(50)
            ]);
            return response()->json([
                'status'    => 'success',
                'user'      => $user
            ], 200);
        }

        // user password not matched
        return response()->json([
            'status' => 'error' , 
            'message' => 'Invalid Credentials.'
        ], 401);
    }

    /**
     * Description
     * @param api_token
     * @return type
     */

    public function logout(Request $request){
        $api_token = $request->api_token;

        $user = User::where('api_token', $api_token)->first();

        if(!$user){
            return response()->json([
 
            ], 401);
        }


        $user->api_token = null;
        $user->save();

        return response()->json([
                'status' => 'success' , 
                'message' => 'You are Logged Out'
        ], 200);
    }

}