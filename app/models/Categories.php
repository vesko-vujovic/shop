<?php

class Categories extends \Eloquent {

	protected $table         = 'categories';

	protected     $fillable  = ['name'];

	// the static rules for validation to use them without creating an object
	public static $rules     = array('name' =>'required|min:3');

	public function category()
	{
		return $this->belongsTo('Categories');
	}


}