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

// -------- 初期値 ------------
Route::get('/', function () {
    return view('welcome');
});

// -------- login関連 ------------
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

// -------- user関連 ------------
Route::get('/useredit/{id}', 'UserController@showUser');
Route::patch('/useredit', 'UserController@updateUser');

// -------- relation関連 ------------
Route::get('/member', 'UserController@allUsers');
Route::get('/member/{id}', 'UserController@showUsers');
Route::post('/unfollow', 'RelationController@unfollowUser');
Route::post('/follow', 'RelationController@followUser');
Route::get('/followers/{id}', 'RelationController@followers');
Route::get('/following/{id}', 'RelationController@following');

// -------- category関連 ------------
Route::get('/categories', 'CategoryController@showCategory');
Route::get('/create', 'CategoryController@showCreate');
Route::post('/create', 'CategoryController@createCategory');
Route::get('/edit/{id}', 'CategoryController@edit');
Route::patch('/edit/{id}', 'CategoryController@update');
Route::delete('/delete/{id}', 'CategoryController@delete');
Route::get('/user/category/{id}', 'CategoryController@showUserCategory');

// -------- word関連 ------------
Route::get('category/{id}/word', 'WordController@allWords');
Route::get('/category/{id}/create/words', 'WordController@showWord');
Route::post('/category/{id}/create/words', 'WordController@createWord');
Route::get('/category/{category_id}/edit/{word_id}', 'WordController@edit');
Route::patch('/category/{category_id}/edit/{word_id}', 'WordController@update');
Route::delete('/category/{category_id}/delete/{word_id}', 'WordController@delete');

// -------- lesson関連 ------------
Route::post('category/{category_id}/lesson_word', 'LessonController@createLesson');
Route::get('lesson/{lesson_id}/category/{category_id}', 'LessonController@allWordsAnswers');
Route::post('lesson/{lesson_id}/category/{category_id}', 'LessonController@createLeassonWord');
Route::post('lesson/{lesson_id}/category/{category_id}/finish', 'LessonController@createLeassonWords');
Route::get('lesson/{lesson_id}/finish/{word_count}', 'LessonController@showResult');

// Route::get('lesson/{lesson_id}/finish/{word_count}', 'LessonController@showResult');

// -------- 履歴関連 ------------
Route::get('learned/{id}', 'LessonController@showResultAll');
Route::get('learned/lesson/{id}', 'LessonController@showResultAllLesson');
