<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/27 0027
 * Time: 23:24
 */

/**
 * @param $name
 * @param bool $default
 * @param bool $filter
 * @return bool
 */

function post($name, $default = false, $filter = false){
    if (isset($_POST[$name])) {
        if ($filter) {
            switch ($filter) {
                case 'int':
                    return is_numeric($_POST[$name]) ? $_POST[$name] : $default;
                    break;
            }
        } else {
            return $_POST[$name];
        }
    } else {
        return $default;
    }
}

function get($name, $default = false, $filter = false){
    if (isset($_GET[$name])) {
        if ($filter) {
            switch ($filter) {
                case 'int':
                    return is_numeric($_GET[$name]) ? $_GET[$name] : $default;
                    break;
            }
        } else {
            return $_GET[$name];
        }
    } else {
        return $default;
    }
}

function I($name, $default = false, $filter = false){
    if (isset($_REQUEST[$name])) {
        if ($filter) {
            switch ($filter) {
                case 'int':
                    return is_numeric($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
                    break;
            }
        } else {
            return $_REQUEST[$name];
        }
    } else {
        return $default;
    }
}


/***
 * @param $val
 * @return mixed
 * @introduction 根据配置的语言包显示语言
 */
function L($val){

    $langPath = defined('LANG') ?  (APP . "/lang/".LANG.".php") : (APP . "/lang/CHN.php");
    if(is_file($langPath)){
        $langArr = include $langPath;
        return $langArr[$val];
    }else{
        echo  $langPath ."语言包文件不存在"; exit;
    }
}
