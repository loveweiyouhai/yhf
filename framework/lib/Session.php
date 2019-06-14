<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/6/15 0015
 * Time: 0:16
 */

namespace framework\lib;

class Session
{
    public function __construct()
    {
        @session_start();
    }

    static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    static function get($name)
    {
        if (isset($_SESSION[$name]))
            return $_SESSION[$name];
        else
            return false;
    }

    static function getAll()
    {
        if (isset($_SESSION))
            return $_SESSION;
        else
            return false;
    }

    static function del($name)
    {
        unset($_SESSION[$name]);
    }

    static function destroy()
    {
        $_SESSION = array();
        session_destroy();
    }

}