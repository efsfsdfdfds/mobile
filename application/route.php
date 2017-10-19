<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::get('index','index/Index/index');
Route::get('index1','Admin/Index/index');
Route::get('aindex','Admin/Aindex/aindex');
Route::any('num','Admin/Number/num');
Route::any('city','Admin/Number/city');
Route::any('qq','Admin/Qq/qq');
Route::any('inserts','Admin/Inserts/inse');
Route::any('lista','Admin/Lista/lis');
Route::any('chaxun','Admin/Lista/chaxun');
Route::any('shijian','Admin/Lista/shijian');
Route::any('daochu','Admin/Daochu/expUser');
Route::any('ddd','Admin/Daochu/ddd');
Route::any('impuser','Admin/Daoru/impUser');
Route::any('impexcel','Admin/Daoru/impExcel');
Route::any('del','Admin/Del/del');
Route::any('delall','Admin/Del/delall');
Route::any('udt','Admin/Update/udt');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
