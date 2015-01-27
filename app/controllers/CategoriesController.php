<?php

class CategoriesController extends \BaseController {

	public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('admin');
    }

    public function getIndex()
    {
      return View::make('categories.index')
          ->with('categories', Categories::all());
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), Categories::$rules);

        if($validator->passes())
        {
            $category           = new Categories();
            $category->name     = Input::get('name');
            $category->save();

            return Redirect::to('admin/categories/index')
                ->with('message', 'Category Created');
        }

        return Redirect::to('admin/categories/index')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }

    public function postDestroy()
    {
        $category = Categories::find(Input::get('id'));

        if($category)
        {
            $category->delete();
            return Redirect::to('admin/categories/index')
                ->with('message', 'Category Deleted');

        }
        return Redirect::to('admin/categories/index')
            ->with('message', 'Something went wrong please try again later');
    }

}