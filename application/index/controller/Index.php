<?php
namespace app\index\controller;


use Ali\Send;
use think\facade\Config;

class Index
{
    public function index()
    {
        echo Config::get("app.default_return_type");
        die;
        return 'hello world';
    }

    public function hello($name = 'ThinkPHP5')
    {
        echo Config::get("app.default_return_type");
        return 'hello,' . $name;
    }
    public function test()
    {
        // echo Config::get("app.default_return_type");
     Send::push();
    }
}
