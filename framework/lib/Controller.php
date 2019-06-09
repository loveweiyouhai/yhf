<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/28 0028
 * Time: 23:04
 */

namespace framework\lib;

use framework\HF;

class Controller extends HF
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
            $loader = new \Twig\Loader\FilesystemLoader(APP."/views/");
            $twig = new \Twig\Environment($loader, [
                'cache' => HF."/logs/view",
                'debug'=>DEBUG
            ]);
            $template = $twig->load('index.html');
            $template->display($this->assign ? $this->assign:'');
        }else{
           echo  $filePath ."视图文件不存在";
        }


    }
}