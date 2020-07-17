<?php

use think\facade\Route;

Route::get('think',function (){
   return 'hello,Think PHP 6.0';
});

Route::get('','Index/index');
Route::get('hello','Index/hello');
