<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , [ 'except' => ['index', 'show'] ]);
    }

    public function index(){
    	return Board::all();
    }

    public function show($id){
    	$board = Board::findOrFail($id);
    	return $board;
    }

    public function store(Request $request){

    	Board::create([
    		'name' 		=> $request->name,
    		'user_id'	=> 1
    	]);

    	return response()->json([ 'message' => 'success'], 200);
    }

}