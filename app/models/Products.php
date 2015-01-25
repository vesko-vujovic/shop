<?php

class Products extends \Eloquent {


	protected     $table      = 'products';
	protected     $fillable   = ['category_id', 'title', 'description', 'price', 'availability', 'image'];


	public static $rules      = array(

		'category_id'         => 'required|integer',
		'title'               => 'required|min:2',
		'description'         => 'required|min:20',
		'price'               => 'required|numeric',
		'availability'        => 'integer',
		'image'               => 'required|mimes:jpeg,jpg,bmp,png,gif'
	);







}