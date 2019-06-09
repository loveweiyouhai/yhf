<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/27 0027
 * Time: 23:33
 */

namespace framework;
use framework\lib\Log;
use \framework\lib\Route;

class YHF
{
    public static $classMap = array();

    //启动框架
    static public function run()
    {
        //$start_time = microtime(true);


        //启动Log日志
        Log::init();

        $route = new  Route();
        //获取控制器的名字
        $controllerName =$route->controller;
        //获取方法的名字
        $methodName =$route->action;
        //获取文件的路径
        $controllerFile = APP."/".CONTROLLER_PATH."/".$controllerName.CONTROLLER_SUFFIX.".php";
        //获取控制器
        $controllerClass = "\\".MODULE."\\".CONTROLLER_PATH."\\".$controllerName.CONTROLLER_SUFFIX;

        if (is_file($controllerFile)){
            //引入控制器文件
            include $controllerFile;
            //实例化控制器类文件
            $controller = new $controllerClass();
            //调用控制器方法
            $controller->$methodName();
        }else{
            throw new \Exception("找不到控制器".$controllerName.CONTROLLER_SUFFIX);
        }

        //$end_time = microtime(true);
        //echo '耗时'.round($end_time-$start_time,3).'秒<br>';
        //echo 'Now memory_get_usage: ' . memory_get_usage() . '<br />';
    }

    /**
     * @param $class
     * @return bool
     * @introduction 自动加载类
     */
    static public function load($class)
    {
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace("\\", "/", $class);
            $file = YHF.DIRECTORY_SEPARATOR.$class.".php";
            if (is_file($file)) {
                include($file);
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}