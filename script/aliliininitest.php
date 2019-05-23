<?php
# 测试解析 ini格式的文件
$file = "../config/aliliin.ini";
$res  = parse_ini_file($file, true);
var_dump($res);
