<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Http\Controllers\Controller;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Validator;

class ThemeController extends Controller {

	public function frontend_index() {

		$cats    = Categories::orderBy('id', 'asc')->get();
		$feature = Theme::orderBY('id', 'dsc')->where('feature', 1);
		$feature = $feature->paginate(8);
		$popular = Theme::orderBY('id', 'dsc')->where('popolar', 1);
		$popular = $popular->paginate(8);
		return view('frontend.index', [
				'cats'     => $cats,
				'features' => $feature,
				'populars' => $popular
			]);
	}
	public function detail($id) {
		$detail = Theme::find($id);
		$cats   = Categories::all();

		if (empty($detail)) {
			return '404 Page Not Found.';
		} else {
			return view('frontend.theme-detail', [
					'cats'   => $cats,
					'detail' => $detail,
				]);
		}
	}
	public function category_list($id) {
		$cats   = Categories::all();
		$cat    = Categories::find($id);
		$themes = Theme::all();

		return view('frontend.category-list', [
				'cats'   => $cats,
				'cat'    => $cat,
				'themes' => $themes
			]);
	}

	public function search(Request $request) {
		$search = $request->search;
		$cats   = Categories::all();

		$find = Theme::orderBy('title');
		if (!empty($search)) {
			$find = Theme::where('title', 'LIKE', '%'.$search.'%');
		}
		$find = $find->paginate(8);
		return view('frontend.search', [
				'cats'   => $cats,
				'find'   => $find,
				'search' => $search
			]);
	}

	public function add(Request $request) {

		$this->middleware('auth');

		$validator = Validator::make($request->all(), [
				'category'          => 'required',
				'title'             => 'required|max:255',
				'price_tag'         => 'required|max:255',
				'tag'               => 'required|max:255',
				'short_description' => 'required|max:255',
				'description'       => 'required',
				'seo_title'         => 'required|max:255',
				'seo_keyword'       => 'required|max:255',
				'metadata'          => 'required|max:255',
				'image'             => 'max:2000000|required|mimes:jpg,jpeg,png',

			]);
		if ($request->price_tag != "free") {
			$validator = Validator::make($request->all(), [
					'category'          => 'required',
					'title'             => 'required|max:255',
					'price_tag'         => 'required|max:255',
					'tag'               => 'required|max:255',
					'short_description' => 'required|max:255',
					'description'       => 'required',
					'seo_title'         => 'required|max:255',
					'seo_keyword'       => 'required|max:255',
					'image'             => 'max:2000000|required|mimes:jpg,jpeg,png',
					'regular_price'     => 'required|max:255',
					'full_code_price'   => 'required|max:255',
				]);
		}
		if ($validator->fails()) {
			return redirect('/theme')
			->withInput()
			->withErrors($validator);
		}

		if (Input::hasFile('file')) {
			$zip = Input::file('file');
			$zip->move('themes', $zip->getClientOriginalName());
		}

		if (Input::hasFile('image')) {
			$file = Input::file('image');
			$file->move('uploads', $file->getClientOriginalName());

		}

		$theme                    = new Theme;
		$theme->title             = $request->title;
		$theme->category          = $request->category;
		$theme->price_tag         = $request->price_tag;
		$theme->regular_price     = $request->regular_price;
		$theme->full_price        = $request->full_code_price;
		$theme->short_description = $request->short_description;
		$theme->description       = $request->description;
		$theme->seo_title         = $request->seo_title;
		$theme->seo_keyword       = $request->seo_keyword;
		$theme->metadata          = $request->metadata;
		if ($request->feature) {
			$theme->feature = 1;
		} else {
			$theme->feature = 0;
		}
		if ($request->popular) {
			$theme->popolar = 1;
		} else {
			$theme->popolar = 0;
		}
		$theme->tag        = $request->tag;
		$theme->theme_name = $zip->getClientOriginalName();
		$theme->image_name = $file->getClientOriginalName();
		$theme->save();
		Session::flash('message', 'New Theme Added Successfully');
		return redirect('/admin_index');
	}
	public function show($id) {
		$this->middleware('auth');
		$show = \App\Theme::find($id);
		return view('theme.show', [
				'show' => $show
			]);
	}
	public function index() {
		$this->middleware('auth');
		$themes = Theme::orderBy('id', 'asc')->get();
		return view('theme.index', [
				'themes' => $themes,
			]);
	}
	public function delete($id) {
		$this->middleware('auth');
		$theme = \App\Theme::find($id);
		if (empty($theme)) {
			return "Page Not Found";
		} else {
			$theme->delete();
			unlink($theme->image_name);
			Session::flash('delete', "Theme $theme->title deleted Sucessfully.");
			return redirect('/admin_index');
		}
	}
	public function edit($id) {
		$this->middleware('auth');
		$edit = \App\Theme::find($id);

		$cat = \App\Categories::all();
		if (empty($edit)) {
			return "Page Not Found";
		} else {
			return view('theme.edit', [
					'theme' => $edit,
					'cat'   => $cat,
				]);
		}
	}
	public function update($id) {
		$this->middleware('auth');

		$theme = \App\Theme::find($id);
		if (empty($theme)) {
			return "Page NOT Found!!!!";
		} else {
			$update = array(
				'title'             => 'required|max:255',
				'category'          => 'required|max:255',
				'price_tag'         => 'required',
				'short_description' => 'required|max:255',
				'description'       => 'required',
				'seo_title'         => 'required',
				'seo_keyword'       => 'required',
				'metadata'          => 'required',
			);
			$validator = Validator::make(Input::all(), $update);
			if ($validator->fails()) {
				return redirect('theme_edit/'.$id)
				->withErrors($validator)
				->withInput(Input::all());
			} else {
				$theme->title             = Input::get('title');
				$theme->category          = Input::get('category');
				$theme->price_tag         = Input::get('price_tag');
				$theme->regular_price     = Input::get('regular_price');
				$theme->full_price        = Input::get('full_code_price');
				$theme->short_description = Input::get('short_description');
				$theme->description       = Input::get('description');
				$theme->seo_title         = Input::get('seo_title');
				$theme->seo_keyword       = Input::get('seo_keyword');
				if (Input::get('feature')) {
					$theme->feature = 1;
				} else {
					$theme->feature = 0;

				}

				if (input::get('popular') == 'on') {
					$theme->popolar = 1;
				} else {
					$theme->popolar = 0;
				}
				$theme->tag      = Input::get('tag');
				$theme->metadata = Input::get('metadata');
				$theme->save();
				Session::flash('message', ' Theme Updated Successfully');
				return redirect('/admin_index');
			}
		}
	}
	public function get_add_to_cart(Request $request, $id) {
		// die($id);
		$theme   = Theme::find($id);
		$oldCart = Session::has('cart')?Session::get('cart'):null;
		$cart    = new Cart($oldCart);
		$cart->add($theme, $theme->id);

		$request->session()->put('cart', $cart);
		return redirect()->back();

	}

	function get_category_value(Request $request) {
		dd($request->input('category'));
		$category_theme = Theme::where('category', $request->input('category'))->first();

		if ($category_theme) {
			echo json_encode([
					'category_theme' => $category_theme,
				]);
		}

	}
}
