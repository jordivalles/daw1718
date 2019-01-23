<?php

class Application_Model_DbTable_Tasques extends Zend_Db_Table_Abstract
{

    protected $_name = 'tasques';

    public function novaTasca($id,$descripcio){
        $data=array('id'=>$id,'descripcio'=>$descripcio);
        $this->insert($data);
    }

}

