<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('about', function () {
    return view('about');
});
Route::get('services', function () {
    return view('services');
});
Route::get('healthcare', function () {
    return view('healthcare');
});
Route::get('education', function () {
    return view('education');
});
Route::get('agriculture', function () {
    return view('agriculture');
});
Route::get('contact', function () {
    return view('contact');
});
Auth::routes();

Route::get('images/{image}', function($image) {
    if (File::exists($imagePath = storage_path("app/images/{$image}"))) {
        return Image::make($imagePath)->response();
    }
})->where('image', '.+');

Route::get('/home', 'HomeController@index')->name('home');
