<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Board;

class Lists extends Model{

	protected $table = 'lists';

	protected $guarded = [ 'id' ];

	// board relationship
	public function board(){
		return $this->belongsTo(Board::class , 'board_id', 'id');
	}
}