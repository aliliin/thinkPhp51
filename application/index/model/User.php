<?php


namespace app\index\model;


use think\Model;

class User extends Model
{
    public function setNameAtrr($value, $data)
    {
        return $value.'|string';
    }
}