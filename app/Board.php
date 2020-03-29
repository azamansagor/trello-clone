<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Board extends Model{

	protected $guarded = [ 'id' ];

	// user relationship
	public function user(){
		return $this->belongsTo(User::class , 'user_id', 'id');
	}
}