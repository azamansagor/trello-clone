<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lists;

class Card extends Model{

	protected $fillable = [ 'name' , 'list_id' , 'description' ];

	// list relationship
	public function list(){
		return $this->belongsTo(Lists::class , 'lists_id', 'id');
	}
}