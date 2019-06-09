<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/28 0028
 * Time: 0:11
 */

namespace application\controller;
use application\model\NewPrescription;
use framework\lib\Controller;


class IndexController extends Controller
{
    public function index()
    {

        $model = new NewPrescription();
        $list =$model->getList();
        //dump($list);
        $count =$model->getCount();
        //dump($count);

        $single =$model->getSingle(2);
        //dump($single);
        //$this->assign("bb","bb");
        $this->assign("list",$list);
        $this->assign("count",$count);
        $this->display("index");
    }

    public function test()
    {$this->assign("count","test");

        $this->display("test");
    }
}