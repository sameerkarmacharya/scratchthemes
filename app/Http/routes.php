<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

Route::group(['middleware' => 'web'],

function () {
		Route::auth();
		Route::get('/category-list/{id}', 'ThemeController@category_list');

		Route::auth();

		Route::get('/home', 'HomeController@index');
		Route::get('/theme-detail/{id}', 'ThemeController@detail');

		Route::get('/search', 'ThemeController@search');

		// Customers Login and logout Routes Start
		Route::get('/user_login',

			function () {
				return view('frontend.auth.login');
			});
		Route::post('/user_login', 'CustomerController@login');
		Route::get('user_logout', 'CustomerController@logout');
		// Customers Login and logout Routes end

		Route::get('/', 'ThemeController@frontend_index');
		Route::get('/index', 'ThemeController@frontend_index');

		Route::get('/login',

			function () {
				return view('auth/login');
			});

		// Customers Register Route Starts
		Route::get('user_register', function () {

				return view('frontend.auth.register');

			});
		Route::post('user_register', 'CustomerController@register');

		Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

		// Custoerm Register Routes Ends

		// ROUTE FOR CATEGORIES
		Route::get('/category/index', function () {
				$categories = \App\Categories::orderBy('created_at', 'asc')->get();
				return view('categories/index', [
						'categories' => $categories,
					]);
			});
		Route::get('/category/add', function () {
				return view('/categories/add');
			});

		Route::post('/category', function (Request $request) {
				$category = new \App\Categories;
				$validator = Validator::make($request->all(), [
						'title' => 'required|max:255|unique:categories',
					]);
				if ($validator->fails()) {
					return redirect('/category/add')
					->withInput()
						->withErrors($validator);
				}

				$category->title = $request->title;
				$category->save();
				Session::flash('message', 'New Category Added Successfully!');
				return redirect('/category/index');
			});
		Route::get('/edit/{category}', function (\App\Categories $category) {

				return view('categories.edit', [
						'category' => $category,
					]);
			});
		Route::post('/update/{id}', 'CategoriesController@update');

		Route::get('delete/{id}', 'CategoriesController@delete');
		// ROUTE ENDS FOR CATEGORY

		//Route starts for add to cart
		Route::get('/add_to_cart/{id}', 'ThemeController@get_add_to_cart');

		// ROUTE STARTS FOR CATEGORY

		Route::get('/theme', function () {
				$categories = App\Categories::all();
				return view('theme.add', [
						'categories' => $categories,
					]);
			});

		Route::get('fetch_price', function () {
				$var = Input::get('price_tag');
				if ($var == "Fullcode") {
					$value = "asd";
				} else {
					$value = "dsa";
				}
				return Response::json($value);
			});

		Route::post('fetch_data', 'ThemeController@get_category_value');
		Route::post('theme', 'ThemeController@add');
		Route::get('show/{id}', 'ThemeController@show');
		Route::get('/admin_index', 'ThemeController@index');
		Route::get('/theme_edit/{id}', 'ThemeController@edit');
		Route::post('/theme_update/{id}', 'ThemeController@update');
		Route::get('theme_del/{id}', 'ThemeController@delete');
		Route::get('/home', 'HomeController@index');
	});
