<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/6/4 0004
 * Time: 23:21
 */

namespace framework\lib;

/***
 * Class Config
 * @package framework\lib
 * 配置加载类
 */

class Config
{
    static public $config = array();

    /**
     * @param $name
     * @param $file
     * @return mixed
     * 1 先判断配置文件是否存在
     * 2 判断配置是否存在
     * 3 缓存配置
     */
    static public function get($name, $file)
    {
        if (isset(self::$config[$file])) {
            return self::$config[$file][$name];
        } else {
            $path = CORE . "/config/" . $file . ".php";
            if (is_file($path)) {
                $config = include $path;
                if (isset($config[$name])) {
                    self::$config[$file] = $config;
                    return $config[$name];
                } else {
                    throw \Exception("没有这个配置项" . $name);
                }
            } else {
                throw \Exception("找不到配置文件" . $file);
            }
        }
    }

    static public function all($file)
    {
        if (isset(self::$config[$file])) {
            return self::$config[$file];
        } else {
            $path = CORE . "/config/" . $file . ".php";
            if (is_file($path)) {
                $config = include $path;
                self::$config[$file] = $config;
                return $config;
            } else {
                throw \Exception("找不到配置文件" . $file);
            }
        }
    }
}