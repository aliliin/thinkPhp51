<?php
namespace di;

// 依赖注入 控制反转
// 依赖注入主要用来减少代码间的耦合
// 有效分离对象和它所需的外部资源
//
class Person
{
    /**
     * 依赖：  person 类依赖于 Car
     * 注入：  car 类注入到 Person 类中
     * @Author   GaoYongLi
     * @DateTime 2019-05-27
     */
    public function buy($obj)
    {
        // $car = new Car();
        return $obj->pay();
    }
}
