<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller{

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

    public function index($boardId , $listId){
        $board = Board::findOrFail($boardId);

        if(Auth::id() !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }

        $list = $board->lists()->find($listId);

        return response()->json([
            'cards' => $list->cards
        ]);
    }

    public function store(Request $request, $boardId , $listId){

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

        $list = $board->lists()->find($listId);

        $list->cards()->create([
    		'name' 		=> $request->name,
            'description'   => $request->description
    	]);

    	return response()->json([
            'status' => 'success',
            'message'   => 'Card Created Successfully.'
        ], 200);
    }

    public function show($boardId, $listId, $cardId){

        $board = Board::findOrFail($boardId); 

        if(Auth::user()->id !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }

        $card = $board->lists()->find($listId)->cards()->find($cardId);

        return response()->json([
            'status'    => 'success',
            'card'      => $card
        ]);
    }

    public function update(Request $request, $boardId , $listId , $cardId){

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


        $card = $board->lists()->find($listId)->cards()->find($cardId)->update($request->all());

        return response()->json([
            'message'   => 'success',
            'card'     => $card
        ],200);
    }

    public function destroy($boardId , $listId, $cardId){

        $board = Board::findOrFail($boardId);

        if(Auth::user()->id !== $board->user_id){
            return response()->json([
                'status'    => 'error',
                'message'   => 'Unauthorized'
            ], 401);
        }

        $card = $board->lists()->find($listId)->cards()->find($cardId );
        if($card->delete()){
            return response()->json([
                'status'    => 'success',
                'message'   => 'Card Deleted Successfully.'
            ],200);
        }

        return response()->json([
            'status'    => 'error',
            'message'   => 'Something went wrong.'
        ], 400);
    }

}