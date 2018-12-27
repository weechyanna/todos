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




Route::middleware('auth')->group(function (){
  Route::get('/', 'TodosController@index')->name('root');
  Route::get('todos', 'TodosController@index')->name('todos.index');
  Route::get('todos/create', 'TodosController@create')->name('todos.create');
  Route::post('todos', 'TodosController@store')->name('todos.store');
  Route::get('todos/{todo}/edit', 'TodosController@edit')->name('todos.edit');
  Route::put('todos/{todo}', 'TodosController@update')->name('todos.update');
  Route::put('todos/{todo}/complete', 'TodosController@complete')->name('todos.complete');
  Route::delete('todos/{todo}', 'TodosController@destroy')->name('todos.delete');
});

Route::middleware('guest')->group(function(){
  Route::get('login', 'AuthController@showLogin')->name('login.show');
  Route::post('login', 'AuthController@login')->name('login.store');

  Route::get('signup', 'AuthController@showSignup')->name('signup.show');
  Route::post('signup', 'AuthController@signup')->name('signup.store');
});

// Login
// 1. create route to login landing page
// 2. create controller (auth controller)
// 2.1 first request should return a login view
// 2.2 create login form in blade
// 3. another route to process submit request (post)
// 3.1 validate user data
// 4. check database if this email matches this password
// 4.1 if correct redirect them to todos page, if not redirect them back to form with error message
//

//Sign up
//1. create route to sign up page
//2. create controller (signup controller)
//3. create a view to display sign up view
//4. create sign up form in blade
//5. another route to process submit Request
//6. validate (must require email and password)
//7. store new email and password
//8. redirect to todos page if verified
