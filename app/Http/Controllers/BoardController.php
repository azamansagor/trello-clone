<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , [ 'except' => ['index', 'show '] ]);
    }

    public function index(Request $request){
        // return $request->user()->boards;
        return Auth::user()->boards;
    }

    public function store(Request $request){

    	Board::create([
    		'name' 		=> $request->name,
    		'user_id'	=> Auth::id()
    	]);

    	return response()->json([ 'message' => 'success'], 200);
    }

    public function show($id){
        $board = Board::findOrFail($id); 

        if(Auth::user()->id !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }

        return $board;
    }

    public function update(Request $request, $id){
        $board = Board::find($id);

        if(Auth::id() !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }


        $board->update([
            'name'      => $request->name
        ]);

        return response()->json([
            'message'   => 'success',
            'board'     => $board
        ],200);
    }

    public function destroy($id){

        $board = Board::findOrFail($id);

        if(Auth::user()->id !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }

        if(Board::destroy($id)){
            return response()->json([
                'status'    => 'success',
                'message'   => 'Board Deleted Successfully.'
            ],200);
        }

        return response()->json([
            'status'    => 'error',
            'message'   => 'Something went wrong.'
        ], 400);
    }

}