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
        $session = new Session();
        dump($session::getAll());
    }

    public function capth()
    {
        $builder = new CaptchaBuilder();
        $builder->build();
        header('Content-type: image/jpeg');
        $builder->output();
    }

    public function sess()
    {
        $session = new Session();
        $session::set('name', 'admin');
        dump($session::get('name'));
    }
    public function sess1()
    {
        $session = new Session();
        $session::set('age', '10');
        dump($session::get('age'));
    }
    public function sess2()
    {
        $session = new Session();
        $session::set('birthday', '29');
        dump($session::get('birthday'));
    }

}