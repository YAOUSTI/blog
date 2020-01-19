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

Route::prefix('courses')->group(function () {
    Route::get('index', 'CourseController@index');
    Route::post('store', 'CourseController@store');
    Route::put('update/{id}', 'CourseController@update');
    Route::delete('delete/{id}', 'CourseController@delete');
});

Route::prefix('categories')->group(function () {
    Route::get('index', 'CategoryController@index');
    Route::post('store', 'CategoryController@store');
    Route::put('update/{id}', 'CategoryController@update');
    Route::delete('delete/{id}', 'CategoryController@delete');
});

Route::prefix('images')->group(function () {
    Route::post('uploadCourse', 'ImageController@UploadImageCourse');
    Route::post('uploadCategory', 'ImageController@UploadImageCategory');
});

