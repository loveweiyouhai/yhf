<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/28 0028
 * Time: 0:11
 */

namespace application\controller;

use framework\lib\Controller;
use framework\lib\Session;
use Gregwar\Captcha\CaptchaBuilder;


class IndexController extends Controller
{
    public function index()
    {
        $this->display("index");
    }
}