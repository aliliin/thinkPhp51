<?php


// 自己新建的文件不能 和已有的文件中的方法相同
if(!function_exists('abcd')){
    function abcde(){
        return 'ABCDEF';
    }
}
function abcde()
{
    return '返回 控制器下(index)的common.php 文件下的方法';
}
