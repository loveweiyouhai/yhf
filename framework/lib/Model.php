<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/28 0028
 * Time: 22:47
 */

namespace framework\lib;
use \PDO;


class Model extends \Medoo\Medoo
{

    public function __construct()
    {
        $options = include_once APP . "/config/database.php";
        parent::__construct($options);
    }

}