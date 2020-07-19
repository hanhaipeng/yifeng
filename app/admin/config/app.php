<?php

use think\facade\Route;


//Route::get('admin$','Index/index');
//Route::get('admin/welcome','Index/welcome')->name('welcome');
//
////修改密码
//Route::get('admin/resetpwd','Resetpwd/resetpwd')->name('resetpwd');
//Route::post('admin/resetpwd','Resetpwd/resetpwd')->name('resetpwd');
//
////登录
//Route::get('admin/login','Login/login')->name('login');
//Route::post('admin/login','Login/login')->name('login');
//
////退出
//Route::get('admin/logout','Login/logout')->name('logout');

Route::group('admin',function (){
    Route::get('$','Index/index');
    Route::get('/welcome','Index/welcome')->name('welcome');

    //修改密码
    Route::get('/resetpwd','Resetpwd/resetpwd')->name('resetpwd');
    Route::post('/resetpwd','Resetpwd/resetpwd')->name('resetpwd');

    //退出
    Route::get('/logout','Login/logout')->name('logout');

    //classlist
    Route::get('/classlist$','Classlist/index')->name('classlist');
    Route::get('/classlist/create','Classlist/create')->name('classlist.create');
    Route::post('/classlist/add','Classlist/add')->name('classlist.add');
    Route::post('/classlist/update/:id','Classlist/update')->name('classlist.update');
    Route::post('/classlist/delete/:id','Classlist/delete')->name('classlist.delete');
    Route::get('/classlist/edit/:id','Classlist/edit')->name('classlist.edit');

    //classitemlist
    Route::get('/classitemlist/:classid$','Classitemlist/index')->name('classitemlist');
    Route::get('/classitemlist/create/:classid','classitemlist/create')->name('classitemlist.create');
    Route::post('/classitemlist/add','classitemlist/add')->name('classitemlist.add');
})->middleware(app\middleware\CheckAdminLogin::class);

//登录
Route::get('admin/login','Login/login')->name('login');
Route::post('admin/login','Login/login')->name('login');

Route::get('admin/captcha/[:id]', "\\think\\captcha\\CaptchaController@index")->name('/captcha');