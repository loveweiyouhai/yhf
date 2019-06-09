<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/6/5 0005
 * Time: 23:47
 */

namespace framework\lib\driver\log;

use framework\lib\Config;

class File
{
    public $path;

    public function __construct()
    {
        $logOption = Config::get('OPTION', 'log');
        $this->path = $logOption['PATH'];
    }

    public function log($message, $file = 'log')
    {
        if (!is_dir($this->path)) {
            mkdir($this->path, 777,true);
        }
        file_put_contents($this->path."/".$file.".php", json_encode(['date'=>date('Y-m-d H:i:s'),'message'=>$message]).PHP_EOL, FILE_APPEND);
    }

    public function logSaveByYear($message, $file = 'log', $flag= false)
    {
        if ($flag) {
            if (!is_dir($this->path . "/" . date('Y'))) {
                mkdir($this->path . "/" . date('Y'), 777, true);
            }
            $path = $this->path . "/" . date('Y');
        }else{
            if (!is_dir($this->path)) {
                mkdir($this->path, 777,true);
            }
            $path = $this->path;
        }

        file_put_contents($path."/".$file.".php", json_encode(['date'=>date('Y-m-d H:i:s'),'message'=>$message]).PHP_EOL, FILE_APPEND);
    }

    public function logSaveByMonth($message, $file = 'log', $flag= false)
    {
        if ($flag) {
            if (!is_dir($this->path . "/" . date('Ym'))) {
                mkdir($this->path . "/" . date('Ym'), 777, true);
            }
            $path = $this->path . "/" . date('Ym');
        }else{
            if (!is_dir($this->path)) {
                mkdir($this->path, 777,true);
            }
            $path = $this->path;
        }

        file_put_contents($path."/".$file.".php", json_encode(['date'=>date('Y-m-d H:i:s'),'message'=>$message]).PHP_EOL, FILE_APPEND);
    }

    public function logSaveByDay($message, $file = 'log', $flag= false)
    {
        if ($flag) {
            if (! is_dir($this->path . "/" . date('Ymd'))) {
                mkdir($this->path . "/" . date('Ymd'), 777, true);
            }
            $path = $this->path . "/" . date('Ymd');
        }else{
            if (!is_dir($this->path)) {
                mkdir($this->path, 777,true);
            }
            $path = $this->path;
        }
        file_put_contents($path."/".$file.".php", json_encode(['date'=>date('Y-m-d H:i:s'),'message'=>$message]).PHP_EOL, FILE_APPEND);
    }
}