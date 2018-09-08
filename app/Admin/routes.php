<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	if(!Auth::user()->can('admin-show')) { 
		return redirect('/');
		die; 
	}
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);

Route::get('/east-fruit',['as' => 'eastfruit','uses' => '\App\Http\Controllers\EastfruitController@eastfruit']);
Route::get('/east-fruit/edit/{id}',['as' => 'eastfruit-user','uses' => '\App\Http\Controllers\EastfruitController@user']);

Route::match(['get', 'post'], '/excel',['as' => 'excel','uses' => '\App\Http\Controllers\ExcelController@uploadExsel']);
