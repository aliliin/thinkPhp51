<?php
namespace app\index\controller;

use Ali\Send;
use TestReg;
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
    public function yaconf()
    {
        var_dump(\Yaconf::get('aliliin.name'));
    }
    public function hello($name = 'ThinkPHP5')
    {
        echo Config::get("app.default_return_type");
        return 'hello,' . $name;
    }
    public function test()
    {
        echo Config::get("app.aliliiin");
        // Send::push();
    }
    // 使用单利
    public function getSingle()
    {
        $single = \Single::getInstance()->getAbc();
        \Single::getInstance()->getAbc();
        \Single::getInstance()->getAbc();
        \Single::getInstance()->getAbc();
        var_dump($single);
    }
    // 使用注册树模式
    public function regTest()
    {
        $testReg = new \TestReg();
        // \AliRegister::set('ali', $testReg);
        // $a = \AliRegister::get('ali')->getreg();
        $a = \AliRegister::get('TestReg')->getreg();
        var_dump($a);
    }
}
