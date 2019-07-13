<?php


Route::get('/', 'virtualController@index');

Route::get('/front2', 'virtualController@front2');
Route::get('/first', 'virtualController@first');


Route::get('/liveSearch', ['as' => 'liveSearch','uses'=>'ScheduleController@index']);

Route::get('/liveSearch/action','ScheduleController@action')->name('liveSearch.action');

Route::get('/schedules', ['as' => 'schedules','uses'=>'CoursesController@schedule']);

Route::post('/enrollments/POST/{cid}', ['as' => 'enrollments','uses'=>'CoursesController@enrollment']);

Route::post('/performances/POST/{cid}', ['as' => 'performances','uses'=>'EnrollController@performed']);

Route::post('/attendance/POST/{cid}', ['as' => 'attendance','uses'=>'performDataController@attend']);

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/dashEnrolls', ['as' => 'dashEnrolls','uses'=>'DashboardController@dashEnroll']);


Route::resource('posts','PostsController');

Route::resource('courses','CoursesController');

Route::resource('profile','ProfileController');

Route::resource('enrollCourse','EnrollController');

Route::resource('performDatabase','performDataController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
