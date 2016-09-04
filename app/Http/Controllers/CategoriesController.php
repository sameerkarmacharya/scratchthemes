<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Session;
use Validator as Validator;

class CategoriesController extends Controller {

	public function update($id) {
		$category = \App\Categories::find($id);
		$update = array(
			'title' => 'required',
		);
		$validator = Validator::make(Input::all(), $update);
		if ($validator->fails()) {
			return redirect('edit/' . $id)
				->withErrors($validator)
				->withInput(Input::all());
		} else {

			$category->title = Input::get('title');
			$category->save();
			Session::flash('message', "Category Updated Successfully");
			return Redirect('category/index');

		}
	}
	public function delete($id) {
		$cat = \App\Categories::find($id);
		$cat->delete();
		Session::flash('delete', "Category $cat->title  deleted Successfully");
		return redirect('category/index');
	}

}
