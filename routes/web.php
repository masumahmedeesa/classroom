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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/index', 'virtualController@index');

//Route::resource('classroom','virtualController');

Route::get('/', 'virtualController@index');
Route::get('/first', 'virtualController@loggin');
Route::get('/front2', 'virtualController@front2');
Route::get('/classhome', 'virtualController@classhome');
//Route::get('/manageCourse', 'CourseController@getManageCourse');

//Route::get('/manage/course', ['as' => 'manageCourse','uses'=>'CourseController@getManageCourse']);
//
//Route::post('/manage/course/POST', ['as' => 'postIntoCourses','uses'=>'CourseController@postIntoCourses']);
//
//Route::get('/courses', ['as' => 'courses','uses'=>'CourseController@getCourses']);


Route::get('/liveSearch', ['as' => 'liveSearch','uses'=>'ScheduleController@index']);

Route::get('/liveSearch/action','ScheduleController@action')->name('liveSearch.action');

Route::get('/schedules', ['as' => 'schedules','uses'=>'CoursesController@schedule']);

Route::post('/enrollments/POST/{cid}', ['as' => 'enrollments','uses'=>'CoursesController@enrollment']);

Route::post('/performances/POST/{cid}', ['as' => 'performances','uses'=>'EnrollController@performed']);

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/dashEnrolls', ['as' => 'dashEnrolls','uses'=>'DashboardController@dashEnroll']);
//Route::get('/dashEnroll', 'DashboardController@dashEnroll');

Route::resource('posts','PostsController');

Route::resource('courses','CoursesController');

Route::resource('profile','ProfileController');

Route::resource('enrollCourse','EnrollController');