<?php

// 简单的单例模式
class Single
{
    public static $instance = null;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getAbc()
    {
        return "abc";
    }
}
