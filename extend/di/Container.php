<?php

namespace di;

class Container
{
    /**
     * 存放容器的数据
     */
    public $instances = [];
    /**
     *     容器中的对象实例
     */
    public static $instance;

    private function __construct()
    {

    }
    /**
     * 获取当前容器的实例 单例模式
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
    /**
     * $value 是一个实例
     * @Author   GaoYongLi
     * @DateTime 2019-05-28
     */
    public function set($key, $value)
    {
        $this->instances[$key] = $value;
    }
    /**
     *  获取容器里面的实例 会用到反射机制
     *  获取实例返回
     * @Author   GaoYongLi
     * @DateTime 2019-05-28
     */
    public function get($key)
    {
        if (isset($this->instances[$key])) {
            $key = $this->instances[$key];
        }
        $reflect = new \ReflectionClass($key);
        // 获取累的构造函数
        $c = $reflect->getConstructor();
        if (!$c) {
            return new $key;
        }
        // 看构造函数 中的默认需要传的参数
        $params = $c->getParameters();
        // var_dump($params);
        if (empty($params)) {
            return new $key;
        }
        $args = array();
        foreach ($params as $key => $param) {
            // dump($param);
            $class = $param->getClass();
            if (!$class) {
                // 待处理 如有有多个参数赋值如何处理
            } else {
                $args[] = $this->get($class->name);
            }
        }
        return $reflect->newInstanceArgs($args);
        die;
        return $this->instances[$key];
        // $obj = $this->instances[$key];
        // return $obj();
    }
}
