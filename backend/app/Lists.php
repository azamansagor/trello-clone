<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Board;
use App\Card;

class Lists extends Model{

	protected $table = 'lists';

	protected $guarded = [ 'id' ];

	// board relationship
	public function board(){
		return $this->belongsTo(Board::class , 'board_id', 'id');
	}

	// cards relationship
	public function cards(){
		return $this->hasMany(Card::class);
	}
}