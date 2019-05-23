<?php
// 处理类的自动加载机制 方法
spl_autoload_register("autoload", true, true);
function autoload($className = "")
{
    echo '类名为：' . $className . PHP_EOL;
    include "./{$className}.php";
}
class_alias('Aliliin', 'A'); // 类的别名使用
$aliliin = new A();
echo $aliliin->say();
