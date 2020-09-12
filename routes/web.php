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

Auth::routes();

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/credits', 'PagesController@credits');

Route::get('/stats', 'PagesController@stats');
Route::get('/stats/revenue', 'PagesController@revenue');
Route::get('/stats/expenses', 'PagesController@expenses');
Route::get('/stats/employees', 'PagesController@employees');

Route::resource('posts', 'PostsController');
Route::resource('documents', 'DocumentsController');
Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/posts', 'DashboardController@posts');
Route::get('/dashboard/documents', 'DashboardController@documents');
Route::get('/dashboard/users', 'DashboardController@users');
Route::get('/dashboard/roles', 'DashboardController@roles');