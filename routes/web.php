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

Route::get('/', function () {
    return view('error');
});

Route::get('/ref={ref}', 'StartController@createUser');

Route::get('/subjects', 'StartController@subjects');
Route::get('/results', 'ResultsController@index');
Route::get('/resultsCsv', 'ResultsController@createCsv');
Route::get('/subjectResults', 'ResultsController@subjectResults');
Route::get('/survey', 'SurveyController@survey');
Route::get('/thanks', 'SurveyController@thanks');
Route::post('/saveUser', 'StartController@saveUser');


Route::post('/survey', 'SurveyController@begin');
Route::post('/submitAnswer', 'SurveyController@submitAnswer');
