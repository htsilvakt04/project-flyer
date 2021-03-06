<?php
use Illuminate\Http\Request;

Route::get("/", "PagesController@home");


Route::resource("flyers", "FlyersController");
Route::get("{zip}/{street}", "FlyersController@show");
Route::post("{zip}/{street}/photos", [
  "as" => "store_photo_path",
  "uses" => "PhotosController@store"
]);
Route::delete("photos/{id}", "PhotosController@destroy");

Auth::routes();
Route::get('/home', 'HomeController@index');
