<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// New Project
Route::post('/project', 'ProjectController@newProject');

// Get a project
Route::get('/project/{id}', ['uses' => 'ProjectController@showProject']);

// Edit Project
Route::post('/project/{id}', ['uses' => 'ProjectController@editProject']);
