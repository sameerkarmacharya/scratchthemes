<?php

namespace App\Http\Controllers;
use App\Customer;

use Auth;

use Illuminate\Http\Request;
use Session;

use Validator;

class CustomerController extends Controller {

	public function login(Request $request) {
		$e         = $request->email;
		$validator = Validator::make($request->all(), [
				'email'    => 'required',
				'password' => 'required',
			]);

		if ($validator->fails()) {
			return redirect('/user_login')
			->withInput()
			->withErrors($validator);
		}

		$customer = Customer::where('email', '=', $request->email)
		                                                  ->where('password', '=', md5($request->password))->first();

		if ($customer) {
			Auth::loginUsingId($customer->id);
			Session::set('name', $customer->name);
			Session::set('id', $customer->id);
			return redirect()->intended('index');
		} else {
			echo "sss";
		}
	}
	public function logout() {
		Session::flush();
		return redirect('index');
	}

	public function register(Request $request) {
		$validator = Validator::make($request->all(), [
				'name'                  => 'required',
				'email'                 => 'required',
				'password'              => 'required',
				'password_confirmation' => 'required',
			]);

		if ($validator->fails()) {
			return redirect('/user_register')
			->withInput()
			->withErrors($validator);
		}
		$customer           = new Customer;
		$customer->name     = $request->name;
		$customer->email    = $request->email;
		$customer->password = md5($request->password);
		$customer->save();
		return redirect('/index');

	}

}
