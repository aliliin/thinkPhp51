<?php

class Ali
{
    public $ali  = 1;
    private $a   = 3;
    protected $b = 5;

    /**
     * Alil 类的 ali 方法
     * @Author   GaoYongLi
     * @DateTime 2019-05-27
     * @version  [version]
     * @param    [type]     $a [description]
     * @param    [type]     $b [description]
     * @return   [type]        [description]
     */
    public function getAli($a, $b)
    {
        return $a . '- Aliliin - ' . $b;
    }
    public function test()
    {
        return 'test';
    }
    public function tesst($test = 1)
    {
        return $test;
    }
    private function pub($test = 1)
    {
        return $test;
    }
}
