<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('main');
Route::get('/articles','ArticleController@index');
Route::get('/articles_list','ArticleController@showArticles');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('products', function(){
    return 'This is a list of products';
})->name('products.index');
Route::get('products/create', function(){
    return 'A form to create a product';
})->name('products.create');
