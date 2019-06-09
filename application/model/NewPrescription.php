<?php
/**
 * Created by PhpStorm.
 * User: Mypc
 * Date: 2019/5/29 0029
 * Time: 0:57
 */

namespace application\model;

use framework\lib\Model;

class NewPrescription extends Model
{
    public $table = "ecst_newprescription";
    public $columnCount = "newprescription_id";

    public function getList()
    {
        return $this->select($this->table,"*");
    }

    public function getCount()
    {
        return $this->count($this->table);
    }

    public function getSingle($id)
    {
        return $this->get($this->table,"*",['newprescription_id'=>$id]);
    }
}