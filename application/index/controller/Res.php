<?php

namespace app\index\controller;

use Ali\Send;
use app\common\Ali;
use app\common\Aliliin;
use Finecho\Logistics\Logistics;
use TestReg;
use think\Container;
use think\facade\Config;

class Res
{
    public function index()
    {
        echo  'res/index';
        halt(input());

    }

    public function save()
    {
        halt(input());
    }

    public function update($id)
    {
        halt($id);
    }

    public function delete($id)
    {

        halt($id);
    }
}