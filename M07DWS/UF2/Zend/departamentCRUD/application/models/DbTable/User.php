<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';
    
    public function validUser($username, $password) {
        $data = $this->fetchRow("nom = '" . $username . "' and password = '". $password . "'");
        if ($data == null)
            return false;
        return true;
    }

}

