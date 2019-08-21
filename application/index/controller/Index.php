<?php

namespace app\index\controller;

use Ali\Send;
use app\common\Ali;
use app\common\Aliliin;
use Finecho\Logistics\Logistics;
use TestReg;
use think\Container;
use think\Controller;
use think\Db;
use think\facade\Config;

class Index extends Controller
{
    public function index()
    {

        half(input());die;
//        echo Config::get("app.default_return_type");
        return 'hello world';
    }

    public function testSuccess()
    {
        return $this->success('继承了Controller 使用了 官方提供的 执行成功的方法','',
            [1=>'继承了Controller 使用了 官方提供的 执行成功的方法']);
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

    // 依赖注入
    public function di()
    {
        \di\Container::getInstance()->set("person", '\di\Person');
        \di\Container::getInstance()->set("car", '\di\Car');
        $obj = \di\Container::getInstance()->get("person", '3343');
        dump($obj->buy());
        die;

        \di\Container::getInstance()->set("person", new \di\Person(new \di\Car()));
        $obj = \di\Container::getInstance()->get("person");
        dump($obj->buy());
        die;
        \di\Container::getInstance()->set("person", new \di\Person());
        \di\Container::getInstance()->set("car", new \di\Car());
        $obj = \di\Container::getInstance()->get("person");
        dump($obj);
        dump($obj->buy(\di\Container::getInstance()->get("car")));
        die;
        $ali = new \di\Person();
        $Car = new \di\Car();
        $bmw = new \di\Bwm();
        var_dump($ali->buy($bmw));
    }

    // 反射的机制
    public function rel()
    {
        $aliObj = new \Ali();
        dump($aliObj);
        $aliObj2 = new \ReflectionClass($aliObj);
        dump($aliObj2);
        $instance = $aliObj2->newInstance(); // 相当于实例化了这个类
        dump($instance);
        dump($aliObj2->getMethods()); // 相当于获取这个类中的所有参数
        // 获取类中的方法的注视
        foreach ($aliObj2->getMethods() as $method) {
            dump($method->getDocComment());
        }
        // 拿到类中的所有熟悉，不管 是私有的还是公共的
        dump($aliObj2->getProperties()); // 会返回一个数组，数组中的 name 就是属性的名字
        // 调用类中的方法
        // 方法一
        echo $instance->getAli(1, 3);
        echo '<br/>';
        // 方法二
        $method = $aliObj2->getMethod("getAli");
        echo $method->invokeArgs($instance, ['mmm', '3343']);
        echo '<br/>';
        // 方法3
        $method = $aliObj2->getMethod("test");
        // 不传参数的调用方法 或者有默认值的方法
        echo $method->invoke($instance);
        echo '<br/>';
        $method = $aliObj2->getMethod("tesst");
        echo $method->invoke($instance);
        echo '<br/>';
        // 判断某个方法是不是公共的
        $method = new \ReflectionMethod($aliObj, 'pub');
        if ($method->isPUblic()) {
            echo '是公共的';
        } else {
            echo '不是公共的';
        }
        echo '<br/>';
        // 获取方法中的 参数
        dump($method->getParameters());
        die;
    }

    /**
     *  新增测试物流接口信息
     */
    public function testlogistics()
    {
        $config = [
            'provider' => 'kdniao', // aliyun/juhe/kuaidi100
            'kdniao' => [
                'app_code' => 'd7696d82-95d5-4922-ab95-4e0adee0fe8c',
                'customer' => '1270293',
            ],
        ];
        $logistics = new Logistics($config);
        $companies = $logistics->companies();
        $order = $logistics->order('805741929402797742', '圆通');
        echo $order['company'];
        echo $order->getCourierPhone();
        echo $order->getCode(); // 状态码
        echo $order->getMsg(); // 状态信息
        echo $order->getCompany(); // 物流公司简称
        echo $order->getNo(); // 物流单号
        echo $order->getStatus(); // 当前物流单详情
        echo $order->getCourier(); // 快递员姓名
        echo $order->getCourierPhone(); // 快递员手机号
        print_r($order->getList()); // 物流单状态详情
        print_r($order->getOriginal()); // 获取接口原始返回信息
        echo '<br/>';
        echo $order->getCode();
        echo '<br/>';
        echo json_encode($order);

    }

    public function acount()
    {
        $obj = new \AliCount();
        echo $obj->count();
        echo count($obj);
    }

    public function container()
    {
        dump(Container::get("config")->get('app.'));
        $config  = new \Config();
        dump($config::get("app."));
        die;
    }

    public function facade()
    {
        $config  = new \Config(); // think\facade\config;
//        dump($config::get("app."));
        dump(Config::get("app."));
    }

    public function facadetest()
    {
        $obj = new Aliliin();
        echo $obj->testAliliin();
        // 需要把上面的类实现为 门面模式的方式调用
        echo  \app\facade\Aliliin::testAliliin();
        \think\Facade::bind('\app\facade\Ali','app\common\Ali');
        dump( Ali::testAliliin());
    }

    // 加载  配置文件里面写的方法；（类似 common 中的 方法）
    // 先加载 系统里面的 common 文件下的方法
    public function test1()
    {
        dump(abcd());
//        Container::get('sa')->abcd();die;
        // 这种使用方法，需要在 provider 文件中 添加此类 应用容器绑定定义
        dump(\container()::get('sa')->abce());
//        dump(abcde());
    }

    // 加载  配置文件里面写的方法； common 中的 方法
    public function abcd(){
        dump(abcd());
        dump(abcde());
    }

    /**
     *  操作数据库 两个场景，一个 是 DB 一个是 Model
     * Db: (Db => 用户操作数据库的入口 =》 用户接口； Connection 链接器 Builder => Sql语句生成器）
     */
    public function testDb()
    {
//        $res = Db::query("select * from student");
        $res = Db::table("student")->where(['s_sex' => '男'])->All();
        dump($res );
    }
}
