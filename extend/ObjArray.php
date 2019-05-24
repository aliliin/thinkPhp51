<?php

// ArrayAccess（数组式访问）接口
// 提供像访问数组一样访问对象的能力的接口。
class ObjArray implements \ArrayAccess
{
    private $container = ['title' => 'Aliliin'];
    //  设置一个偏移位置的值
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    // 检查一个偏移位置是否存在
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    // 复位一个偏移位置的值
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    //  获取一个偏移位置的值
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}
