<?php

class Category extends \Eloquent {
	protected     $fillable  = ['name'];

	public static $rules     = array('name' =>'required|min:3');
}