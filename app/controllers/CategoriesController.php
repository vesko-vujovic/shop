<?php

class CategoriesController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getIndex()
    {
      return View::make('categories.index')
          ->with('categories', Categories::all());
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), Category::$rules);

        if($validator->passes())
        {
            $category           = new Category();
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
        $category = Category::find(Input::get('id'));

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