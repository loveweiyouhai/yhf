<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/27 0027
 * Time: 23:38
 */

namespace framework\lib;

/**
 * Class Route
 * @package framework\lib
 * 路由处理类
 */

class Route
{
    public  $controller;
    public  $action;
    public function __construct()
    {
        //获取URL的控制器和方法
        if( isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != "/"){
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode("/" ,trim($path,"/"));
            if (isset($pathArr[0])){
                $this->controller=$pathArr[0];
            }
            unset($pathArr[0]);
            if (isset($pathArr[1])){
                $this->action=$pathArr[1];
                unset($pathArr[1]);
            }else{
                $this->action= Config::get('ACTION','Router');
            }

            //处理url的参数
            $paramsCount = count($pathArr)+2;
            $i =2 ;
            while($i<$paramsCount){
                if(isset($pathArr[$i +1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i+1];
                }
                $i += 2;
            }
            $_GET = $this->sqlCheck($_GET);
            $_POST = $this->sqlCheck($_POST);
            $_REQUEST = $this->sqlCheck($_REQUEST);
        }else{
            $this->controller =  Config::get('CONTROLLER','Router');
            $this->action= Config::get('ACTION','Router');
        }
    }

    private function sqlCheck($paramater){
        $arr = array();
        foreach($paramater as $k=>$v){
            if(is_array($v)){
                foreach($v as $u){
                    $arr[$k][] = $u;
                }
            }else{
                $arr[$k] = sprintf("%s",preg_replace('/\b(=|<|>|and|or|;|where|from|not|HAVING|select)\b/im','',$v));
            }
        }
        return $arr;
    }
}