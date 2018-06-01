<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Occupation;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $_occupation = new Occupation;

    	if($request->isMethod('post')) {
    		$validator = Validator::make($request->all(), [
	            'name' => 'required|string|max:255',
	            'email' => 'required|string|email|max:255|unique:users',
	            'password' => 'required|string|min:6|confirmed',
                'positionSelect' => 'required|integer',
	            'position' => 'string|min:2'
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
                    'positionSelect' => $request->positionSelect,
            		'position' => $request->position
            	]);

            	mail($request->email, 'Код подтверждения', 'Код для активации учетной записи на сайте east-fruit.com: '.$cod);
            	return redirect('email');
            }
    	} else {
            $occupation = $_occupation->allOccupation();

    		return view('auth.register')->with([
                'occupations' => $occupation
            ]);
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
                // if($request->cod == 1111) {
            		if(session('positionSelect') == 9999) {
                        User::insert([
                            'name' => session('name'),
                            'position' => session('position'),
                            'email' => session('email'),
                            'password' => bcrypt(session('password'))
                        ]);
                    } else {
                        User::insert([
                            'id_occupation' => session('positionSelect'),
                            'name' => session('name'),
                            'position' => session('position'),
                            'email' => session('email'),
                            'password' => bcrypt(session('password'))
                        ]);
                    }
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
