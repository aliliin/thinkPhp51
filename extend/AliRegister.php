<?php

// 注册树模式
// 注册树模式通过将对象实例注册到一棵全局的对象树上
// 需要使用的时候从对象树上采摘下来使用
class AliRegister
{
    // 注册树池子
    protected static $objects = null;
    // 将对象挂到树上
    public static function set($key, $object)
    {
        self::$objects[$key] = $object;
    }
    /**
     * 从树上获取对象，如果没有直接注册
     * @Author   GaoYongLi
     */
    public static function get($key)
    {
        if (!isset(self::$objects[$key])) {
            self::$objects[$key] = new $key;
        }
        return self::$objects[$key];
    }
    public static function _unset($key)
    {
        unset(self::$objects[$Key]);
    }
}
