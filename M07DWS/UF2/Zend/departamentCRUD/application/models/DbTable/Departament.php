<?php

class Application_Model_DbTable_Departament extends Zend_Db_Table_Abstract
{

    protected $_name = 'departament';


    public function guardar($nom) {
            $data = array('nom' => $nom);
            $this->insert($data);
    }

    public function seleccionar($id) {
        // El toArray, retorna l'objecte com un array associatiu
        // preparat per fer el popùlate
        return $this->fetchRow("id = " . (int)$id)->toArray();
    }
    
    public function eliminar($id) {
        $this->delete('id=' . (int)$id);
    }

    public function editar($id, $nom) {
        $data = array ("nom" => $nom);
        $this->update($data, 'id=' . (int)$id);
        // $this->delete('id=' . (int)$id);
    }

    public function allData() {
        $data = $this->fetchAll()->toArray();
        
        $res = array ();
        foreach ($data as $dpt)
        {
            $res[$dpt['id']] = $dpt['nom'];
        }
        return $res;
    }


    
}

