<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/6/5 0005
 * Time: 23:45
 */

namespace framework\lib;


class Log
{
    static public $class;

    static public function init()
    {

        $driver = Config::get('DRIVER', 'log');

        $class = 'framework\lib\driver\log\\' . $driver;
        self::$class = new $class;
    }

    static public function log($message, $file = 'log')
    {
        self::$class->log($message, $file);
    }

    static public function logSaveByYear($message, $file = 'log', $flag = false)
    {
        self::$class->logSaveByYear($message, $file, $flag);
    }

    static public function logSaveByMonth($message, $file = 'log', $flag = false)
    {
        self::$class->logSaveByMonth($message, $file, $flag);
    }

    static public function logSaveByDay($message, $file = 'log', $flag = false)
    {
        self::$class->logSaveByDay($message, $file, $flag);
    }
}