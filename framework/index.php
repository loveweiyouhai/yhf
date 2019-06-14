<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/29 0029
 * Time: 1:14
 */


define("YHF",realpath("../"));
define("CORE",YHF."/framework");
define("APP",YHF."/application");
define("MODULE","application");
define("CONTROLLER_PATH","controller"); //控制器存放的目录
define("CONTROLLER_SUFFIX","Controller");//控制器后缀
define("VIEWS_EXT",".php");//控制器后缀,默认是.php

include YHF."/vendor/autoload.php"; // 加载 composer安装的库

if(DEBUG){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}else {
    ini_set("display_errors", "Off");
}


//引入公共定义的
include CORE."/common/common.php";

//引入函数库
include CORE."/common/function.php";

//引入核心文件
include CORE."/YHF.php";

//在找不到类的时候自动执行某个方法
spl_autoload_register('\framework\YHF::load');

//启动框架
\framework\YHF::run();