<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


Route::get('/', 'index/hello');
//Route::get('think', function () {
//    return 'hello,ThinkPHP5!';
//});
//
//Route::get('api', function () {
//    return 'hello,api!';
//});
//  /: 冒号对应的是动态参数
//Route::get('hello/:name', 'index/hello');
//Route::get('hello/:name$', 'index/hello'); 完全匹配
//Route::get('hello/[:yam]', 'index/hello',['ext' => 'shtml']); // url 后缀的写法
//Route::get('hello/[:yam]', 'index/hello')->ext('html'); // url 后缀的写法
//Route::get('hello/:yam', 'index/hello',[],['yam' => '\w+']); // 变量规则
//Route::pattern(['yam' => '\w+']); // 变量规则
/**
 * 资源路由
 */
//Route::resource('res', 'index/res');
/**
 * 数组路由注册
 */
return [
    '__rest__' => [
        'res' => 'index/res',
//        'tst' => 'index/e'
    ],
    'ams/:ma' => 'index/:ma',
    'hello/:name' => 'index/hello',
    // http://tp51.work/test/1122.html 访问的方式
    'test/:na'=>[
        'index/test',
        ['ext' => 'html'],
        ['na' => '\d+']
    ]
];
