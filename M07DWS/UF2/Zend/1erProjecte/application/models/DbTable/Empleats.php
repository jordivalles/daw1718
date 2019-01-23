<?php

class Application_Model_DbTable_Empleats extends Zend_Db_Table_Abstract
{

    protected $_name = 'empleats';
    public function getAll(){
        $select=$this->select();
        $select->from(array('emp'=>'empleats'),array('empid'=>'id','empnom'=>'nom','empdpt'=>'dpt'));
        $select->setIntegrityCheck(false);
        $select->join(array('dpt'=>'departament'),'dpt.id=emp.dpt');
        $s=$select->query();
        return $s->fetchAll();
    }
    public function nouEmp($nom,$dpt){
        $data=array('nom'=>$nom,'dpt'=>$dpt);
        return $this->insert($data);
    }

}

