<?php
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['web']], function() {
    Route::get('/index', 'CityController@index')->name('index');

    Route::get('/flight-list', 'FlightListController@flight_list')->name('flight-list');

    Route::get('/flight-detail/{fl_id}', 'FlightDetailController@flight_detail')->name('flight-detail');

    Route::get('/flight-book', 'FlightBookController@flight_book')->name('flight-book');

    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/register', 'RegisterController@postRegister');

    Route::get('/update', 'UpdateController@getInfor')->name('update');
    Route::post('/update', 'UpdateController@postUpdate')->name('attendupdate');

    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@postLogin');
    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::get('/city-list', 'AirportController@index')->name('city-list');
    Route::get('/airline-list', 'AirlineController@index')->name('airline-list');

    Route::get('/create-flight', 'CreateFlightController@flight_infor')->name('create-flight');
    Route::post('/create-flight', 'CreateFlightController@flight_create')->name('create-flight');
});