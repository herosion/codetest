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

Route::get('/', 'FrontController@index')->name('home');

Route::get('/category/{id}/{slug?}', 'FrontController@showQuestionsByCat')->name('category');

Route::get('/question/{id}', 'FrontController@showQuestion')->name('question');

Route::any('/login', 'LoginController@showLogin')->name('login');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){

    Route::resource('admin', 'Admin\QuestionsController'); //permet d'acceder à toutes les méthodes du controller RobotController ayant la ressource*/
});