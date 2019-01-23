<?php
require_once 'Zend/Db/Table/Abstract.php';
class Application_Model_DbTable_Departament extends Zend_Db_Table_Abstract
{

    protected $_name = 'departament';
    public function nouDpt($nom){
        $data=array('nom'=>$nom);
        $this->insert($data);
    }
    public function eliminarDpt($id){
        $this->delete('id='.$id);
    }
    public function modificarDpt($id,$nom){
        $data=array('nom'=>$nom);
        $this->update($data,'id='.$id);
    }
    public function getOne($id){
        $row=$this->fetchRow('id='.$id);
        if(!$row){
            return null;
        }
        return $row->toArray();
    }
}

