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
    // ArrayAccess 的使用
    public function obj()
    {
        $obj = new \ObjArray();
        echo '<pre/>';
        var_dump(isset($obj["two"]));
        var_dump($obj["two"]);
        unset($obj["two"]);
        var_dump(isset($obj["two"]));
        $obj["two"] = "A value";
        var_dump($obj["two"]);
        $obj[] = 'Append 1';
        $obj[] = 'Append 2';
        $obj[] = 'Append 3';
        print_r($obj);
        echo "\n";
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
