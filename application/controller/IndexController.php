<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/28 0028
 * Time: 0:11
 */

namespace application\controller;

use framework\lib\Controller;
use Gregwar\Captcha\CaptchaBuilder;


class IndexController extends Controller
{
    public function index()
    {
        $this->display("index");
    }

    public function capth()
    {
        $builder = new CaptchaBuilder();
        $builder->build();
        header('Content-type: image/jpeg');
        $builder->output();
    }

}