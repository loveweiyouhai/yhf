<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/29 0029
 * Time: 1:14
 */


define("HF",realpath("../"));
define("CORE",HF."/framework");
define("APP",HF."/application");
define("MODULE","application");
define("CONTROLLER_PATH","controller"); //控制器存放的目录
define("CONTROLLER_SUFFIX","controller");//控制器后缀
define("VIEWS_EXT",".html");//控制器后缀,默认是.html

include HF."/vendor/autoload.php";

if(DEBUG){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    //ini_set("display_errors","On");
}else {
    ini_set("display_errors", "Off");
}


//引入公共定义的
include CORE."/common/common.php";

//引入函数库
include CORE."/common/function.php";

//引入核心文件
include CORE."/HF.php";

//在找不到类的时候自动执行某个方法
spl_autoload_register('\framework\HF::load');

//启动框架
\framework\HF::run();