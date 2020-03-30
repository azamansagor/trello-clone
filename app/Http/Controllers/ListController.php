<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth' , [ 'except' => ['index', 'show '] ]);
        $this->middleware('auth');
    }

    public function index($boardId){
        $board = Board::findOrFail($boardId);

        if(Auth::id() !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }
        return response()->json([
            'lists' => $board->lists
        ]);
    }

    public function store(Request $request, $boardId){

        $this->validate($request,[
            'name'  => 'required'
        ]);

        $board = Board::findOrFail($boardId);
        if(Auth::id() !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }

        $board->lists()->create([
    		'name' 		=> $request->name,
    	]);

    	return response()->json([ 'message' => 'success'], 200);
    }

    public function show($boardId, $listId){

        $board = Board::findOrFail($boardId); 

        if(Auth::user()->id !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }

        $list = $board->lists()->find($listId);

        return response()->json([
            'status'    => 'success',
            'list'      => $list
        ]);
    }

    public function update(Request $request, $boardId , $listId){

        $this->validate($request,[
            'name'  => 'required'
        ]);

        $board = Board::find($boardId);

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

    public function destroy($boardId , $listId){

        $board = Board::findOrFail($boardId);

        if(Auth::user()->id !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }

        $list = $board->lists()->find($listId);
        if($list->delete()){
            return response()->json([
                'status'    => 'success',
                'message'   => 'List Deleted Successfully.'
            ],200);
        }

        return response()->json([
            'status'    => 'error',
            'message'   => 'Something went wrong.'
        ], 400);
    }

}