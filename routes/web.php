<?php

use App\Recipe;
Use App\category;
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
// Route::get('/',function(){
// 	dd(app('test'));
// });
Route::resource('recipe', 'RecipeController');
Route::get('home', 'HomeController@index');
Route::get('/','PublicController@index');
Route::get('detail/{id}','PublicController@detail');
Route::resource('category','CategoryController');

Auth::routes();
