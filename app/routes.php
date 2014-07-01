<?php
/**
 * routes.php
 * 
 * @author rose1988.c@gmail.com
 * @version 1.0
 * @date 2014-6-29 下午5:05:13
 */
Route::get('/', array('as'=>'index', 'uses' => 'HomeController@index'));

// 后台管理
Route::group(array('prefix' => 'manage', 'before' => 'auth'),function() {
    Route::get('/user', array('as'=>'user','uses' => 'UserController@userList'));
    Route::get('/', array('as'=>'manage','uses' => 'ManageController@index'));
});

// 本地使用
Route::group(array('before' => 'dev'), function()
{
    Route::get('/env', function(){return app::environment();});
});

/* login */
Route::any('/login',  array('as'=>'login','uses' => 'AccountController@login'));
Route::any('/signup', array('as'=>'signup','uses' => 'AccountController@signup'));
Route::get('/logout', 'AccountController@logout');