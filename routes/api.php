<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', 'API\UserController@index');
Route::group(['prefix' => 'user'], function () {
    Route::post('store', 'API\UserController@store');
    Route::get('edit/{id}', 'API\UserController@edit');
    Route::post('update/{id}', 'API\UserController@update');
    Route::delete('delete/{id}', 'API\UserController@delete');
});

Route::get('laws', 'API\LawController@index');
Route::group(['prefix' => 'law'], function () {
    Route::post('store', 'API\LawController@store');
    Route::get('edit/{id}', 'API\LawController@edit');
    Route::post('update/{id}', 'API\LawController@update');
    Route::delete('delete/{id}', 'API\LawController@delete');
});

Route::get('articles', 'API\ArticleController@index');
Route::group(['prefix' => 'article'], function () {
    Route::post('store', 'API\ArticleController@store');
    Route::get('edit/{id}', 'API\ArticleController@edit');
    Route::post('update/{id}', 'API\ArticleController@update');
    Route::delete('delete/{id}', 'API\ArticleController@delete');
});

Route::get('judgements', 'API\JudgementController@index');
Route::group(['prefix' => 'judgement'], function () {
    Route::post('store', 'API\JudgementController@store');
    Route::get('edit/{id}', 'API\JudgementController@edit');
    Route::post('update/{id}', 'API\JudgementController@update');
    Route::delete('delete/{id}', 'API\JudgementController@delete');
});