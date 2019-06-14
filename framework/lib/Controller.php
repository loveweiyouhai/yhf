<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/28 0028
 * Time: 23:04
 */

namespace framework\lib;


use framework\YHF;

class Controller extends YHF
{
    public $assign;

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $fileArr = explode(".",$file);
        if ( is_array($fileArr) &&  count($fileArr)==2 && VIEWS_EXT == ".".$fileArr[1]){
            $filePath = APP."/views/".$file;
        }else{
            $filePath = APP."/views/".$file. VIEWS_EXT;
        }
        if(is_file($filePath)){
            if ($this->assign){
                extract($this->assign);
            }
            include $filePath;
        }else{
            throw new \Exception($filePath ."视图文件不存在");
        }
    }

    public function render($url)
    {
        header("Location:".$url);
        exit;
    }
}