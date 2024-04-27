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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Teacher Routes
Route::prefix('teacher')->middleware('auth:api')->group(function () {
    Route::get('/assignments', 'TeacherAssignmentController@index');
    Route::post('/assignments', 'TeacherAssignmentController@store');
    Route::get('/assignments/{assignment}', 'TeacherAssignmentController@show');
    Route::put('/assignments/{assignment}', 'TeacherAssignmentController@update');
    Route::delete('/assignments/{assignment}', 'TeacherAssignmentController@destroy');
});

// Student Routes
Route::prefix('student')->middleware('auth:api')->group(function () {
    Route::get('/assignments', 'StudentAssignmentController@index');
    Route::get('/assignments/{assignment}', 'StudentAssignmentController@show');
    Route::post('/assignments/{assignment}/submit', 'StudentAssignmentController@submit');
    Route::put('/assignments/{assignment}/submit', 'StudentAssignmentController@updateSubmission');
    Route::delete('/assignments/{assignment}/submit', 'StudentAssignmentController@deleteSubmission');
});

