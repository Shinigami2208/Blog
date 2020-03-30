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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'/bai-viet'], function(){
    Route::post('/them-bai-viet', 'ArticleController@create')->name('createArticle');
    Route::get('/danh-sach-bai-viet', 'ArticleController@showListPage')->name('showListArticle');
    Route::get('/chi-tiet-bai-viet/{id}', 'ArticleController@showDetail')->name('ShowDetailArticle');
    Route::post('/sua-bai-viet', 'ArticleController@update')->name('updateArticle');
    // Route::get('/xoa-bai-viet/{id}', 'ArticleController@delete')->name('deleteArticle');
    Route::get('/them-bai-viet/dang-bai', 'ArticleController@showForm');
    Route::get('/sua-bai-viet/dang-bai/{id}', 'ArticleController@showEditform')->name('showEditForm');
});

Route::group(
    ['prefix' => '/api'],
    function(){
        Route::get('/article/list', 'ArticleController@listPage');
        Route::post('/article/delete', 'ArticleController@delete');
    }
);