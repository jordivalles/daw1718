<?php

class Application_Model_DbTable_Empleat extends Zend_Db_Table_Abstract
{

    protected $_name = 'empleat';

    public function guardar($nom, $dpt) {
        $data = array('nom' => $nom, 'dpt' => $dpt);
        $this->insert($data);
    }

    public function seleccionar($id) {
        // El toArray, retorna l'objecte com un array associatiu
        // preparat per fer el popùlate
        return $this->fetchRow("id = " . (int)$id)->toArray();
    }
    
    public function allInfo() {
        
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false);
        
        $select->join('departament as dpt',
              'dpt.id = empleat.dpt',
              'dpt.nom as nomdpt');
        
        return $this->fetchAll($select)->toArray();
    }
    
    /*
    public function infoDpt () {

        $select = $this->select(Zend_Db_Table::setDefaultAdapter())
                 ->setIntegrityCheck(false);
  
        $select->from(array('e' => 'empleat'), 
                array('num' => 'count(e.id)'))
                 ->joinRight (array('d' => 'departament'), 'e.dpt = d.id', 
                         array('d.nom as nom_dpt', 'd.id as id_dpt'))
                ->group('d.nom', 'd.id');
        
        return $this->fetchAll($select)->toArray();
    }
    */

    public function infoDpt () {
        return $this->_db->query("select * from empleat")->fetchAll();
    }

    
    public function eliminar($id) {
        $this->delete('id=' . (int)$id);
    }    
    
    public function editar($id, $nom, $dpt) {
        $data = array ("nom" => $nom, "dpt" => $dpt);
        $this->update($data, 'id=' . (int)$id);
    }
    
}
