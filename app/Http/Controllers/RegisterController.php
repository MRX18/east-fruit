<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegisterController extends Controller
{
    public function register(Request $request) {

    	if($request->isMethod('post')) {
    		$validator = Validator::make($request->all(), [
	            'name' => 'required|string|max:255',
	            'email' => 'required|string|email|max:255|unique:users',
	            'password' => 'required|string|min:6|confirmed',
	            'position' => 'string|max:255'
	        ]);

	        if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
            	$cod = rand(100000, 999999);

            	session([
            		'cod' => $cod,
            		'name' => $request->name,
            		'email' => $request->email,
            		'password' => $request->password,
            		'position' => $request->position
            	]);

            	mail($request->email, 'Код подтверждения', 'Код для активации учетной записи на сайте east-fruit.com: '.$cod);
            	return redirect('email');
            }
    	} else {
    		return view('auth.register');
    	}

    }

    public function email(Request $request) {

    	if($request->isMethod('post')) {
    		$validator = Validator::make($request->all(), [
	            'cod' => 'required|integer',
	        ]);

	        if($validator->fails()) {
                return redirect('email')->withInput()->withErrors($validator->errors());
            } else {
            	if($request->cod == session('cod')) {
            		User::create([
			            'name' => session('name'),
			            'position' => session('position'),
			            'email' => session('email'),
			            'password' => bcrypt(session('password'))
			        ]);
			        $idUser = User::where('email',session('email'))->value('id');
			        Auth::loginUsingId($idUser);
            		return redirect('/');
            	} else {
            		return redirect('email');
            	}
            	// dd($request->cod.'=='.session('cod'));
            }
    	} else {
    		return view('auth.email');
    	}

    }
}
